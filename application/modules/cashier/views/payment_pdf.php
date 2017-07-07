<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="<?=base_url('assets\backend_assets\page\sales\pdf.css')?>" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <!-- <img src="<?=base_url('assets\backend_assets\page\sales\logo.png')?>"> -->
      </div>
      <div id="company">
        <h3 class="name">PT. LIMA PUTRA REALTI</h3>
        <div>Jl.Harmonika Pasar 2 No.12 Setiabudi Medan</div>
        <!-- <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div> -->
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name"><?=$customer->name?></h2>
          <div><?=$customer->address?></div>
          <div><?=$customer->phone?></div>
          <!-- <div class="address">796 Silver Harbour, TX 79273, US</div>
          <div class="email"><a href="mailto:john@example.com">john@example.com</a></div> -->
        </div>
        <div id="invoice">
          <h1>INVOICE <?=$payment->no_invoice?></h1>
          <div class="date">Date of Invoice: <?=date('d-M-Y', strtotime($payment->date_created))?></div>
          <div class="">Invoice No: <?=$payment->no_invoice?></div>
          <div class="">Contract No: <?=$payment->no_kontrak?></div>
          <!-- <div class="date">Due Date: 30/06/2014</div> -->
        </div>
      </div>
      <table border="1" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <!-- <th class="no">#</th> -->
            <!-- <th class="desc">DESCRIPTION</th> -->
            <th class="qty">Payment Type</th>
            <th class="unit">PRICE</th>
            <!-- <th class="total">TOTAL</th> -->
          </tr>
        </thead>
        <tbody>
          <?php 
            // $i=1;$total_price=0;foreach($payment as $k){ 
            // $unit = getAll($this->tbl_unit, array('id'=>'where/'.$k->unit_id))->row();
            // $total_price = $total_price + $unit->price;
          ?>
          <tr>
            <!-- <td class="no"><?=$i++?></td> -->
            <!-- <td class="desc"><h3><?=$unit->name?> <?=getValue('name', $this->tbl_area, array('id'=>'where/'.$unit->area_id))?> / <?=$unit->floor?> / <?=$unit->number?></h3>Creating a recognizable design solution based on the company's existing visual identity</td> -->
            <td class="qty"><?=$payment->payment_type?></td>
            <td class="unit" align="right">Rp. <?=number_format($payment->nominal)?></td>
          </tr>
        </tbody>
        <!-- <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>$5,200.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 25%</td>
            <td>$1,300.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tfoot> -->
      </table>
      <!-- <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> -->
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>