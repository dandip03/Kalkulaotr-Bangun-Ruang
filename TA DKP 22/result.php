<?php
class KalkulatorBangunRuang
{
    private $panjang;
    private $lebar;
    private $tinggi;
    private $jari_jari;
    private $sisi;

    public function setPanjang($panjang)
    {
        $this->panjang = $panjang;
    }

    public function setLebar($lebar)
    {
        $this->lebar = $lebar;
    }

    public function setTinggi($tinggi)
    {
        $this->tinggi = $tinggi;
    }

    public function setJariJari($jari_jari)
    {
        $this->jari_jari = $jari_jari;
    }

    public function setSisi($sisi)
    {
        $this->sisi = $sisi;
    }

    public function hitungLuasKubus($sisi)
    {
        return  6 * ($sisi * $sisi);
    }

    public function hitungVolumeKubus($sisi)
    {
        return $sisi * $sisi * $sisi;
    }

    public function hitungLuasBalok($panjang, $lebar, $tinggi)
    {
        return 2 * ($panjang * $lebar) + ($panjang * $tinggi) + ($lebar * $tinggi);
    }

    public function hitungVolumeBalok($panjang, $lebar, $tinggi)
    {
        return $panjang * $lebar * $tinggi;
    }

    public function hitungLuasTabung($jari_jari, $tinggi)
    {
        return 2 * pi() * $jari_jari * ($jari_jari + $tinggi);
    }

    public function hitungVolumeTabung($jari_jari, $tinggi)
    {
        return pi() * $jari_jari * $jari_jari * $tinggi;
    }
}

$luasKubus = null;
$volumeKubus = null;
$luasBalok = null;
$volumeBalok = null;
$luasTabung = null;
$volumeTabung = null;
$sisierr=$panjangerr=$lebarerr=$tinggierr=$jarierr="";

$kalkulator = new KalkulatorBangunRuang(); // Inisialisasi objek KalkulatorBangunRuang

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kalkulator = new KalkulatorBangunRuang(); // Inisialisasi objek KalkulatorBangunRuang
    if ($_POST["bangun_ruang"] == "kubus") {


            $kalkulator->setSisi($_POST["sisi"]);
   
        $luasKubus = $kalkulator->hitungLuasKubus($_POST["sisi"]);
        $volumeKubus = $kalkulator->hitungVolumeKubus($_POST["sisi"]);   
    } elseif ($_POST["bangun_ruang"] == "balok") {
      
    
   
            $kalkulator->setPanjang($_POST["panjang"]);
        
 
  
            $kalkulator->setLebar($_POST["lebar"]);
     
    
            $kalkulator->setTinggi($_POST["tinggi"]);
            $luasBalok = $kalkulator->hitungLuasBalok($_POST["panjang"], $_POST["lebar"], $_POST["tinggi"]);
            $volumeBalok = $kalkulator->hitungVolumeBalok($_POST["panjang"], $_POST["lebar"], $_POST["tinggi"]);
    }   elseif ($_POST["bangun_ruang"] == "tabung") {
        
           
     
            $kalkulator->setJariJari($_POST["jari_jari"]);
     
       
   
    
            $kalkulator->setTinggi($_POST["tinggi"]);
      
        $luasTabung = $kalkulator->hitungLuasTabung($_POST["jari_jari"], $_POST["tinggi"]);
        $volumeTabung = $kalkulator->hitungVolumeTabung($_POST["jari_jari"], $_POST["tinggi"]);
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Kalkulator Bangun Ruang</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <div class="container">
        <h1>Kalkulator Bangun Ruang</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="bangun_ruang">Bangun Ruang</label></td>
                    <td>
                        <select name="bangun_ruang" id="bangun_ruang" onchange="hideoption(this)">
                            <option value="kubus">Kubus</option>
                            <option value="balok">Balok</option>
                            <option value="tabung">Tabung</option>
                        </select> 
                    </td>
                    <td><label for="rumus">Rumus</label></td>
                    <td>
                        <select name="rumus" id="rumus">
                            <option value="Luas">Luas</option>
                            <option value="Volume">Volume</option>
                        </select>
                    </td>
                </tr>
                <tr>
                <tr><img src="https://i.pinimg.com/236x/96/e3/59/96e359ad42a77fc9ba68dc51330e3d80.jpg
                        " alt="gambar kubus" class="src"></tr>
                    <tr><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Cuboid_simple.svg/360px-Cuboid_simple.svg.png
                        " alt="gambar balok" class="src"></tr>
                    <tr><img src="https://akupintar.id/documents/portlet_file_entry/20143/1+%288%29.png/78981bbc-9482-c8fe-17f8-d53578cd41c4?imagePreview=1" alt="gambar tabung" class="src"></tr>
                <tr id="sisi" style="display: block;">
                    <td><label for="sisi">Sisi</label></td>
                    <td><input type="number" name="sisi" id="sisi"></td>
                    <td> <span class="error">* <?php echo $jarierr;?></span></td>
                </tr>
                <tr id="panjang" style="display: none;">
                    <td><label for="panjang">Panjang</label></td>
                    <td><input type="number" name="panjang" id="panjang"></td>
                    <td> <span class="error">* <?php echo $jarierr;?></span></td>
                </tr>
                <tr id="lebar" style="display: none;">
                    <td><label for="lebar">Lebar</label></td>
                    <td><input type="number" name="lebar" id="lebar"></td>
                    <td> <span class="error">* <?php echo $jarierr;?></span></td>
                </tr>
                <tr id="tinggi" style="display: none;">
                    <td><label for="tinggi">Tinggi</label></td>
                    <td><input type="number" name="tinggi" id="tinggi"></td>
                    <td> <span class="error">* <?php echo $jarierr;?></span></td>
                </tr>
                <tr  id="jari" style="display: none;">
                    <td><label for="jari_jari">Jari-jari</label></td>
                    <td><input type="number" name="jari_jari" id="jari_jari"></td>
                    <td> <span class="error">* <?php echo $jarierr;?></span></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
                
                </tr>
            </table>
            <?php if (isset($_POST["submit"])) : ?>
                
                <div class="result">
                <?php if ($_POST["rumus"] == "Luas") : ?>
            <?php if ($_POST["bangun_ruang"] == "kubus") : ?>
                <?php if ($luasKubus > 0) : ?>
                    <p>Luas Kubus: <?php echo $luasKubus; ?></p>
                <?php endif; ?>
            <?php elseif ($_POST["bangun_ruang"] == "balok") : ?>
                <?php if ($luasBalok > 0) : ?>
                    <p>Luas Balok: <?php echo $luasBalok; ?></p>
                <?php endif; ?>
            <?php elseif ($_POST["bangun_ruang"] == "tabung") : ?>
                <?php if ($luasTabung > 0) : ?>
                    <p>Luas Tabung: <?php echo $luasTabung; ?></p>
                <?php endif; ?>
            <?php endif; ?>
        <?php elseif ($_POST["rumus"] == "Volume") : ?>
            <?php if ($_POST["bangun_ruang"] == "kubus") : ?>
                <?php if ($volumeKubus > 0) : ?>
                    <p>Volume Kubus: <?php echo $volumeKubus; ?></p>
                <?php endif; ?>
            <?php elseif ($_POST["bangun_ruang"] == "balok") : ?>
                <?php if ($volumeBalok > 0) : ?>
                    <p>Volume Balok: <?php echo $volumeBalok; ?></p>
                <?php endif; ?>
            <?php elseif ($_POST["bangun_ruang"] == "tabung") : ?>
                <?php if ($volumeTabung > 0) : ?>
                    <p>Volume Tabung: <?php echo $volumeTabung; ?></p>
                <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
<script>
    function hideoption(option)
    {
        const sisi =document.getElementById("sisi");
        const jari= document.getElementById("jari");
        const tinggi = document.getElementById("tinggi");
        const lebar = document.getElementById("lebar");
        const panjang = document.getElementById("panjang");
        if (option.value == "kubus") {
            if (sisi.style.display === "none") {
                sisi.style.display = "block";
            } else {
                sisi.style.display = "none";
            }
            tinggi.style.display = "none";
                lebar.style.display = "none";
                panjang.style.display = "none";
                jari.style.display = "none";
        } 
        if (option.value == "balok") {
            if (tinggi.style.display === "none" || panjang.style.display === "none" || lebar.style.display === "none") {
                tinggi.style.display = "block";
                lebar.style.display = "block";
                panjang.style.display = "block";
            } else {
                tinggi.style.display = "none";
                lebar.style.display = "none";
                panjang.style.display = "none";
            }
            sisi.style.display = "none";
            jari.style.display = "none";
        }
        if(option.value == "tabung"){
            if (tinggi.style.display === "none" || jari.style.display === "none") {
                tinggi.style.display = "block";
                jari.style.display = "block";
            } else {
                tinggi.style.display = "block";
                jari.style.display = "block";
            }
                lebar.style.display = "none";
                panjang.style.display = "none";
                sisi.style.display = "none";
        }
    }
</script>
</html>