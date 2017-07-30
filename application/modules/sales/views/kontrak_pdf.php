<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="<?=base_url('assets\page\sales\pdf.css')?>" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <!-- <img src="<?=base_url('assets\page\sales\logo.png')?>"> -->
      </div>
      <div id="company">
        <h3 class="name">>De Panorama Garden</h3>
        <div>Tasik</div>
        <!-- <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div> -->
      </div>
    </header>
    <main>
      <div id="invoice">
        <h4>SPU - <?=$kontrak->no_kontrak?> <?php echo $customer->name ?></h4>
        <!-- <div class="date">No: </div> -->
      </div>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Yang bertanda tangan dibawah ini:</div>
          <table border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td width="20%">Nama Pemesan</td>
                <td width="5%">:</td>
                <td width="25%"><?php echo $customer->name ?></td>
                <td width="20%">Cara Pembayaran</td>
                <td width="5%">:</td>
                <td width="20%"><?php echo $kontrak_type ?></td>
              </tr>
              <tr>
                <td>Alamat KTP</td>
                <td>:</td>
                <td><?php echo $customer->address ?></td>
                
                <td>Booking Fee</td>
                <td>:</td>
                <td>Rp. <?=number_format($booking_fee->nominal, 0)?></td>
                
              </tr>

              <tr>
                <td width="">No. KTP</td>
                <td width="">:</td>
                <td width=""><?php echo $customer->no_ktp ?></td>
                
                <td>Tgl. Booking Fee</td>
                <td>:</td>
                <td><?=dateIndo($booking_fee->date_payment)?></td>
              </tr>
              <!-- <tr>
                <td width="">Alamat Korespondensi</td>
                <td width="">:</td>
                <td width=""></td>
              </tr> -->
              <tr>
                <td>Telp.</td>
                <td>:</td>
                <td><?php echo $customer->phone;  ?></td>
              </tr>
              <!-- <tr>
                <td>No. HP</td>
                <td>:</td>
                <td></td>
              </tr> -->
              <tr>
                <td>Alamat Email</td>
                <td>:</td>
                <td><?php echo $customer->email;  ?></td>
              </tr>
              <tr>
                <td>Nama Kantor</td>
                <td>:</td>
                <td><?php echo $customer->nama_kantor;  ?></td>
              </tr>
              <tr>
                <td>Alamat Kantor</td>
                <td>:</td>
                <td><?php echo $customer->alamat_kantor;  ?></td>
              </tr>
              <!-- <tr>
                <td>Telp/Fax Kantor</td>
                <td>:</td>
                <td></td>
              </tr>
              <tr>
                <td>Sumber Informasi</td>
                <td>:</td>
                <td></td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
      <br>
      <div class="to">Dengan ini menyatakan bahwa:</div>
      <div class="">Pemesan telah melakukan pemesanan Unit Condominium/Condotel/Commercial</div>
      <div class="">Setiabudu Condominium Medan dengan perincian sebagai berikut:</div>
      <br>
      <table border="1" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">Type</th>
            <th class="desc" align="center">Tower / Lantai / No. Unit</th>
            <th class="unit">Harga Jual</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $i=1;$total_price=0;foreach($kontrak_unit as $k){ 
            $unit = getAll($this->tbl_unit, array('id'=>'where/'.$k->unit_id))->row();
            $total_price = $total_price + $unit->price;
          ?>
          <tr>
            <td class="no"><?=$unit->name?></td>
            <td class="desc"><?=getValue('name', $this->tbl_area, array('id'=>'where/'.$unit->area_id))?> / <?=$unit->floor?> / <?=$unit->number?></td>
            <td class="unit" align="right">Rp. <?=number_format($unit->price, 0)?></td>
          </tr>
          <?php } ?>
          <tr>
            <td></td>
            <td>TOTAL</td>
            <td align="right">Rp. <?=number_format($total_price)?></td>
          </tr>
        </tbody>
      </table>
      <br>
      <?php if($payment_schedule->num_rows() > 0){?>
        <div class="to">Jadwal Pembayaran Uang Muka:</div>
        <table border="0" cellspacing="0" cellpadding="0"> 
          <?php foreach($payment_schedule->result() as $p){?>
          <tr>
            <td class="desc"><?=dateIndo($p->jatuh_tempo);?></td>
            <td class="unit">Rp. <?=number_format($p->nominal)?></td>
          </tr>
          <?php } ?>
        </table>
      <?php } ?>
      <!--
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
      -->
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>