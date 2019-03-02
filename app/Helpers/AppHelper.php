<?php
namespace App\Helpers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class AppHelper{
	/**
	*@example : GlobalHelper::selected($var1,$var2)
	*@retrun : boolean
	*/
    public static function selected($var1,$var2) {
        if($var1 == $var2){
        	return 'selected';
        }
    }


    /**
	*@example : GlobalHelper::selected($sting,$var2)
	*@retrun : boolean
	*@param 1 : string explode to array
	*@param 2 : string
	*/
    public static function selected_array($var1,$var2,$object=false) {
        // $var1 = (array) $var1;
    	foreach ($var1 as $key => $value) {
            if($object == false){
                if($value == $var2){
                	return 'selected';
                }
            }else{
                if($value->$object == $var2){
                    return 'selected';
                }
            }
        }
    }

    // untuk membuat nilai terbilang
    public static function terbilang($x, $style=3) {
        function kekata($x) {
            $x = abs($x);
            $angka = array("", "satu", "dua", "tiga", "empat", "lima",
            "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($x <12) {
                $temp = " ". $angka[$x];
            } else if ($x <20) {
                $temp = kekata($x - 10). " belas";
            } else if ($x <100) {
                $temp = kekata($x/10)." puluh". kekata($x % 10);
            } else if ($x <200) {
                $temp = " seratus" . kekata($x - 100);
            } else if ($x <1000) {
                $temp = kekata($x/100) . " ratus" . kekata($x % 100);
            } else if ($x <2000) {
                $temp = " seribu" . kekata($x - 1000);
            } else if ($x <1000000) {
                $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
            } else if ($x <1000000000) {
                $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
            } else if ($x <1000000000000) {
                $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
            } else if ($x <1000000000000000) {
                $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
            }     
                return $temp;
        }  

        if($x<0) {
            $hasil = "minus ". trim(kekata($x));
        } else {
            $hasil = trim(kekata($x));
        }     
        switch ($style) {
            case 1:
                $hasil = strtoupper($hasil);
                break;
            case 2:
                $hasil = strtolower($hasil);
                break;
            case 3:
                $hasil = ucwords($hasil);
                break;
            default:
                $hasil = ucfirst($hasil);
                break;
        }     
        return $hasil;
    }

    public static function renderVaksin($bulan_vaksin,$bulan,$pendataan,$vaksin,$bayi,$pdf = false){
        $text = '';
        foreach($pendataan as $value){
            if($value->vaksin_id == $vaksin->id){
                // $text = "V";
                $tgl_pendataan = date('Y-m-d',strtotime($value->tgl_pendataan));
                $tgl_lahir = \Carbon\Carbon::createFromFormat('Y-m-d',"$bayi->tgl_lahir");
                $tgl_vaksin = \Carbon\Carbon::createFromFormat('Y-m-d',"$tgl_pendataan");
                $umur = $tgl_lahir->diffInMonths($tgl_vaksin);
                if($umur == $bulan){
                    if($pdf == false){
                        $text = "<i class='fa fa-check' title='$value->tgl_pendataan' ></i>";
                    }else{
                        $text = 'v';
                    }                   
                }
            }
        }

        if($bulan_vaksin == 1){
           $bg = "background-color:#cecee7";
        }else if($bulan_vaksin == 2){
            $bg = "background-color:yellow";
        }else if($bulan_vaksin ==3){
            $bg = "background-color:gray";
        }else if($bulan_vaksin ==4){
            $bg = "background-color:red";
        }
        $render = "<td style='$bg' class='text-center'>$text</td>";
        return $render;
    }

    public static function access($role){
        $condition = false;
        foreach ($role as $key => $value) {                
            if(Auth::guard('admin')->user()->role == $value){
                $condition = true;
            }
        }
        return $condition;
    }

    public static function umurBayi($tgl_lahir){
        $tgl_skrg = date('Y-m-d');
        $tgl_lahir = \Carbon\Carbon::createFromFormat('Y-m-d',"$tgl_lahir");        
        return $umur = $tgl_lahir->diffInMonths($tgl_skrg);    
    }

    public static function bulan($bln){
        $bulan = $bln;
        switch ($bulan){
            case 1 : $bulan="Januari";
            break;
            case 2 : $bulan="Februari";
            break;
            case 3 : $bulan="Maret";
            break;
            case 4 : $bulan="April";
            break;
            case 5 : $bulan="Mei";
            break;
            case 6 : $bulan="Juni";
            break;
            case 7 : $bulan="Juli";
            break;
            case 8 : $bulan="Agustus";
            break;
            case 9 : $bulan="September";
            break;
            case 10 : $bulan="Oktober";
            break;
            case 11 : $bulan="November";
            break;
            case 12 : $bulan="Desember";
            break;
        }
        return $bulan;
    }

    public static function uploader(Array $form, Request $request)
    {
        $uploaded = [];
        foreach ($form as $item) {
            if(array_key_exists('type',$item) && $item['type'] == 'file'){
                if($request->hasFile($item['name']) && is_array($request->file($item['name']))){
                    foreach ($request->file($item['name']) as $file) {
                        $uploaded[$item['name']][] = 'storage/'.$file->store('files','public');
                    }
                }elseif ($request->hasFile($item['name'])) {
                   $uploaded[$item['name']] = 'storage/'.$request->{$item['name']}->store('files','public');
                }
            }
        }
        return $uploaded;
    }

}