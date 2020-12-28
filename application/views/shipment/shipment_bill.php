<style type="text/css">
  a.nav-link.active {
    border-width: 4px;
    border-bottom: 4px solid #007bff;
  }

  a.nav-link {
    border-radius: 0px !important;
  }

  a.nav-link:not(.active):hover {
    transition: all 0.3s ease-in-out;
    border-bottom: 4px solid #007bff;
  }
</style>
<div class="main-content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <hr class="mt-0">
            <p class="m-0 text-center">Shipment Number</p>
            <h1 class="font-weight-bold m-0 text-center"><?php echo $shipment_list['tracking_no'] ?></h1>
            <hr class="mb-0">
          </div>
        </div>
        <form action="<?php echo base_url() ?>shipment/shipment_bill_process" method="POST">
          <div class="card">
            <div class="card-body overflow-auto">
              <h6 class="font-weight-bold border-bottom">Invoice Detail</h6>
              <input type="hidden" name="id_invoice" value="<?php echo @$invoice['id']; ?>">
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Bill To</label>
                    <textarea class="form-control" rows="3" readonly><?php echo $shipment_list['billing_name'] ?>&#13;&#10;<?php echo $shipment_list['billing_address'] ?>&#13;&#10;<?php echo $shipment_list['billing_city'] ?>, <?php echo $shipment_list['billing_country'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Attn. to</label>
                    <textarea class="form-control" rows="2" readonly><?php echo $shipment_list['billing_contact_person'] ?>&#13;&#10;<?php echo $shipment_list['billing_phone_number'] ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Invoice No.</label>
                    <input type="text" class="form-control" name="invoice_no" value="<?php echo @$invoice['invoice_no'] ?>" placeholder="Invoice No." <?php echo ((@$invoice['invoice_no'] !== NULL) ? "" : "readonly" ) ?> required>
                  </div>
                  <div class="form-group">
                    <label>Invoice Date</label>
                    <input type="date" class="form-control" name="invoice_date" value="<?php echo ((@$invoice['invoice_date'] !== NULL) ? @$invoice['invoice_date'] : date("Y-m-d")) ?>" placeholder="Invoice Date" required>
                  </div>
                  <div class="form-group">
                    <label>Payment Terms</label>
                    <select class="form-control" name="payment_terms" required>
                      <option value="">- Select One -</option>
                      <!-- <option value="Cash In Advance" <?= (@$invoice['payment_terms'] == 'Cash In Advance') ? 'selected' : ''; ?>>Cash In Advance</option>
                      <option value="Cash In Delivery" <?= (@$invoice['payment_terms'] == 'Cash In Delivery') ? 'selected' : ''; ?>>Cash In Delivery</option>
                      <option value="15 Days" <?= (@$invoice['payment_terms'] == '15 Days') ? 'selected' : ''; ?>>15 Days</option>
                      <option value="30 Days" <?= (@$invoice['payment_terms'] == '30 Days') ? 'selected' : ''; ?>>30 Days</option>
                      <option value="45 Days" <?= (@$invoice['payment_terms'] == '45 Days') ? 'selected' : ''; ?>>45 Days</option>
                      <option value="60 Days" <?= (@$invoice['payment_terms'] == '60 Days') ? 'selected' : ''; ?>>60 Days</option> -->
                      <?php foreach ($payment_terms_list as $key => $value) : ?>
                        <option value="<?php echo $value['name'] ?>" <?= (@$invoice['payment_terms'] == $value['name']) ? 'selected' : ''; ?>><?php echo $value['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <?php if(@$invoice['invoice_no'] == ""):?>
                  <div class="form-group">
                    <label>Branch</label>
                    <input type="text" class="form-control" name="branch" value="<?php echo @$this->session->userdata('branch') ?>" readonly required>
                  </div>
                  <?php endif; ?>
                </div>
                <?php if(@$invoice['invoice_no'] != ""):?>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status_bill" required>
                      <option value="1" <?= (@$shipment_list['status_bill'] == '1') ? 'selected' : ''; ?>>Billed</option>
                      <option value="2" <?= (@$shipment_list['status_bill'] == '2') ? 'selected' : ''; ?>>Paid</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date Paid</label>
                    <input type="date" class="form-control" name="date_paid" value="<?php echo @$shipment_list['date_paid'] ?>" required>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <?php
                $total_all = 0;
              ?>

              <br>
              <table class="table table-bordered" style="font-size: 13px;">
                <tbody>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Tracking No.</b>
                        </div>
                        <div class="col text-right">
                          <?php echo $shipment_list['tracking_no'] ?>
                        </div>
                      </div>
                    </td>
                    <td rowspan="2">
                      <b>Shipper</b><br>
                      <?php echo $shipment_list['shipper_name'] ?><br>
                      <?php echo $shipment_list['shipper_address'] ?><br>
                      <?php echo $shipment_list['shipper_city'] ?>, <?php echo $shipment_list['shipper_country'] ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Type of Service</b>
                        </div>
                        <div class="col text-right">
                          Freight Handling
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Type of Shipment</b>
                        </div>
                        <div class="col text-right">
                          <?php echo $shipment_list['type_of_shipment'] ?>
                        </div>
                      </div>
                    </td>
                    <td rowspan="2">
                      <b>Consignee</b><br>
                      <?php echo $shipment_list['consignee_name'] ?><br>
                      <?php echo $shipment_list['consignee_address'] ?><br>
                      <?php echo $shipment_list['consignee_city'] ?>, <?php echo $shipment_list['consignee_country'] ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col">
                          <b>Type of Mode</b>
                        </div>
                        <div class="col text-right">
                          <?php echo $shipment_list['type_of_mode'] ?> <?php echo ($shipment_list['sea'] == "" ? "" : "(" . $shipment_list['sea'] . ")") ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

              <br>
              <h6 class="font-weight-bold border-bottom">Detail Information</h6>
              <input type="hidden" class="form-control" name="id" value="<?php echo $shipment_list['id']; ?>">
              <input type="hidden" class="form-control" name="category" value="costumer">
              <div class="overflow-auto">
                <table class="table text-center">
                  <thead>
                    <tr class="bg-info">
                      <th nowrap class="text-white font-weight-bold min-w30px">Description</th>
                      <th nowrap class="text-white font-weight-bold min-w30px">Quantity</th>
                      <th nowrap class="text-white font-weight-bold min-w30px">UOM</th>
                      <th nowrap class="text-white font-weight-bold min-w30px">Currency</th>
                      <th nowrap class="text-white font-weight-bold min-w30px">Unit Price</th>
                      <th nowrap class="text-white font-weight-bold min-w30px">Sub Total</th>
                      <th nowrap class="text-white font-weight-bold min-w30px">Exchange Rate to IDR</th>
                      <th nowrap class="text-white font-weight-bold min-w30px">Total</th>
                      <th nowrap class="text-white font-weight-bold min-w30px">Remarks</th>
                      <th nowrap class="text-white font-weight-bold min-w30px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(count($costumer) < 1) : ?>
                    <tr>
                      <td>
                        <input type="text" class="form-control" name="description[]" required>
                        <input type="hidden" class="form-control" name="id_cost[]">
                      </td>
                      <td><input type="number" step="any" class="form-control" value="0" oninput="get_total(this)" name="qty[]"></td>
                      <td>
                        <select class="form-control" name="uom[]" required onchange="get_total(this)">
                          <option value="">-- Select One --</option>
                          <option value="Kg">Kg</option>
                          <option value="M3">M3</option>
                          <option value="Set">Set</option>
                          <option value="Trip">Trip</option>
                          <option value="Pallet">Pallet</option>
                          <option value="%">%</option>
                        </select>
                      </td>
                      <td>
                        <select class="form-control" name="currency[]" required>
                          <option value="">-- Select One --</option>
                          <option value="AED">AED</option>
                          <option value="AUD">AUD</option>
                          <option value="CNY">CNY</option>
                          <option value="EUR">EUR</option>
                          <option value="GBP">GBP</option>
                          <option value="HKD">HKD</option>
                          <option value="IDR">IDR</option>
                          <option value="INR">INR</option>
                          <option value="JPY">JPY</option>
                          <option value="KRW">KRW</option>
                          <option value="MYR">MYR</option>
                          <option value="SGD">SGD</option>
                          <option value="THB">THB</option>
                          <option value="TWD">TWD</option>
                          <option value="USD">USD</option>
                        </select>
                      </td>
                      <td><input type="number" step="any" class="form-control" value="0" oninput="get_total(this)" name="unit_price[]"></td>
                      <td>
                        <input type="text" step="any" class="form-control" value="0" name="subtotal_view[]" readonly>
                        <input type="hidden" step="any" class="form-control" value="0" name="subtotal[]" readonly>
                      </td>
                      <td><input type="number" step="any" class="form-control" value="0" oninput="get_total(this)"name="exchange_rate[]"></td>
                      <td>
                        <input type="text" step="any" class="form-control" value="0" name="total_view[]" readonly>
                        <input type="hidden" step="any" class="form-control" value="0" name="total[]" readonly>
                      </td>
                      <td><textarea class="form-control" name="remarks[]" placeholder="..."></textarea></td>
                      <td>
                        <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                      </td>
                    </tr>
                    <?php endif; ?>
                    <?php 
                      foreach ($costumer as $key => $value) : 
                        $persen = 1;
                        if($value['uom'] == "%"){
                          $persen = 100;
                        }
                        $total_all += ($value['qty'] / $persen)*$value['unit_price']*$value['exchange_rate'];
                    ?>
                    <tr>
                      <td>
                        <input type="text" class="form-control" name="description[]" value="<?php echo $value['description'] ?>" required>
                        <input type="hidden" class="form-control" name="id_cost[]" value="<?php echo $value['id'] ?>">
                      </td>
                      <td><input type="number" step="any" class="form-control" value="<?php echo $value['qty'] ?>" oninput="get_total(this)" name="qty[]"></td>
                      <td>
                        <select class="form-control" name="uom[]" required onchange="get_total(this)">
                          <option value="">-- Select One --</option>
                          <option value="Kg" <?php echo ($value['uom'] == "Kg" ? 'selected' : '') ?>>Kg</option>
                          <option value="M3" <?php echo ($value['uom'] == "M3" ? 'selected' : '') ?>>M3</option>
                          <option value="Set" <?php echo ($value['uom'] == "Set" ? 'selected' : '') ?>>Set</option>
                          <option value="Trip" <?php echo ($value['uom'] == "Trip" ? 'selected' : '') ?>>Trip</option>
                          <option value="Pallet" <?php echo ($value['uom'] == "Pallet" ? 'selected' : '') ?>>Pallet</option>
                          <option value="%" <?php echo ($value['uom'] == "%" ? 'selected' : '') ?>>%</option>
                        </select>
                      </td>
                      <td>
                        <select class="form-control" name="currency[]" required>
                          <option value="">-- Select One --</option>
                          <option value="AED" <?php echo ($value['currency'] == "AED" ? 'selected' : '') ?>>AED</option>
                          <option value="AUD" <?php echo ($value['currency'] == "AUD" ? 'selected' : '') ?>>AUD</option>
                          <option value="CNY" <?php echo ($value['currency'] == "CNY" ? 'selected' : '') ?>>CNY</option>
                          <option value="EUR" <?php echo ($value['currency'] == "EUR" ? 'selected' : '') ?>>EUR</option>
                          <option value="GBP" <?php echo ($value['currency'] == "GBP" ? 'selected' : '') ?>>GBP</option>
                          <option value="HKD" <?php echo ($value['currency'] == "HKD" ? 'selected' : '') ?>>HKD</option>
                          <option value="IDR" <?php echo ($value['currency'] == "IDR" ? 'selected' : '') ?>>IDR</option>
                          <option value="INR" <?php echo ($value['currency'] == "INR" ? 'selected' : '') ?>>INR</option>
                          <option value="JPY" <?php echo ($value['currency'] == "JPY" ? 'selected' : '') ?>>JPY</option>
                          <option value="KRW" <?php echo ($value['currency'] == "KRW" ? 'selected' : '') ?>>KRW</option>
                          <option value="MYR" <?php echo ($value['currency'] == "MYR" ? 'selected' : '') ?>>MYR</option>
                          <option value="SGD" <?php echo ($value['currency'] == "SGD" ? 'selected' : '') ?>>SGD</option>
                          <option value="THB" <?php echo ($value['currency'] == "THB" ? 'selected' : '') ?>>THB</option>
                          <option value="TWD" <?php echo ($value['currency'] == "TWD" ? 'selected' : '') ?>>TWD</option>
                          <option value="USD" <?php echo ($value['currency'] == "USD" ? 'selected' : '') ?>>USD</option>
                        </select>
                      </td>
                      <td><input type="number" step="any" class="form-control" value="<?php echo $value['unit_price'] ?>" oninput="get_total(this)" name="unit_price[]"></td>
                      <td>
                        <input type="text" step="any" class="form-control" value="<?php echo number_format((($value['qty'] / $persen)*$value['unit_price']), 0).".00" ?>" name="subtotal_view[]" readonly>
                        <input type="hidden" step="any" class="form-control" value="<?php echo (($value['qty'] / $persen)*$value['unit_price']) ?>" name="subtotal[]" readonly>
                      </td>
                      <td><input type="number" step="any" class="form-control" value="<?php echo $value['exchange_rate'] ?>" oninput="get_total(this)" name="exchange_rate[]"></td>
                      <td>
                        <input type="text" step="any" class="form-control" value="<?php echo number_format((($value['qty'] / $persen)*$value['unit_price']*$value ['exchange_rate']), 0).".00" ?>" name="total_view[]" readonly>
                        <input type="hidden" step="any" class="form-control" value="<?php echo (($value['qty'] / $persen)*$value['unit_price']*$value['exchange_rate']) ?>" name="total[]" readonly>
                      </td>
                      <td><textarea class="form-control" name="remarks[]" placeholder="..."><?php echo $value['remarks'] ?></textarea></td>
                      <td>
                        <?php if ($key == 0) : ?>
                          <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                        <?php else : ?>
                          <button type="button" onclick="deletecost('<?php echo $value['id'] ?>', this)" class="btn btn-danger"><i class="fas fa-trash m-0"></i></button>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <br>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>VAT</label>
                    <input type="number" class="form-control" name="vat" value="<?php echo @$invoice['vat']+0 ?>" oninput="get_total()" placeholder="VAT" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Discount</label>
                    <input type="number" class="form-control" name="discount" value="<?php echo @$invoice['discount']+0 ?>" oninput="get_total()" placeholder="Discount" required>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md">
                  <h5 class="font-weight-bold text-right">Total All : IDR <span id="total_all" name="total_all"><?php echo number_format($total_all, 0).".00" ?></span></h5>
                </div>
              </div>
              <br>
              <h6 class="font-weight-bold border-bottom">Pay Information</h6>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Beneficiary Name</label>
                    <input type="text" class="form-control" name="beneficiary_name" value="<?php echo @$invoice['beneficiary_name'] ?>" placeholder="Beneficiary Name" required>
                  </div>
                  <div class="form-group">
                    <label>Bank Name</label>
                    <input type="text" class="form-control" name="bank_name" value="<?php echo @$invoice['bank_name'] ?>" placeholder="Bank Name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Acc. No.</label>
                    <input type="text" class="form-control" name="acc_no" value="<?php echo @$invoice['acc_no'] ?>" placeholder="Acc. No." required>
                  </div>
                  <div class="form-group">
                    <label>Notes</label>
                    <textarea class="form-control" name="notes"><?php echo @$invoice['notes'] ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md text-right">
                  <?php if (isset($invoice['invoice_no'])) : ?>
                  <a href="<?php echo base_url() ?>shipment/shipment_invoice_pdf/<?php echo @$invoice['id_shipment'] ?>" target="_blank" class="btn btn-danger"   title="Export Invoice">PDF</a>
                  <?php endif; ?>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
              
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function addrow(btn) {
    var row_copy = $(btn).closest("tr").html();
    $(btn).closest("tbody").append("<tr>" + row_copy + "</tr>");
    var btn_delete = '<button type="button" class="btn btn-danger" onclick="deleterow(this)"><i class="fas fa-trash m-0"></i></button>';
    $(btn).closest("tbody").find("tr:last").find("td:last").html(btn_delete);
    $(btn).closest("tbody").find("tr:last").find("input").val("");
    $(btn).closest("tbody").find("tr:last").find("input[type=number]").val("0");
    $(btn).closest("tbody").find("tr:last").find("select").val("");
    $(btn).closest("tbody").find("tr:last").find("textarea").text("");
  }

  function deleterow(btn) {
    $(btn).closest("tr").remove();
  }

  function get_total(input = "") {
    if(input != ""){
      var row = $(input).closest('tr');
      var unit_price = $(row).find("input[name='unit_price[]']").val();
      var qty = $(row).find("input[name='qty[]']").val();
      var uom = $(row).find("select[name='uom[]']").val();
      if(uom == "%"){
        qty = qty/100;
      }
      var subtotal = qty * unit_price;
      $(row).find("input[name='subtotal[]']").val(subtotal);
      $(row).find("input[name='subtotal_view[]']").val(subtotal.toLocaleString('en-US', {maximumFractionDigits:0}) + ".00");

      var exchange_rate = $(row).find("input[name='exchange_rate[]']").val();
      var total = subtotal * exchange_rate;
      $(row).find("input[name='total[]']").val(total);
      $(row).find("input[name='total_view[]']").val(total.toLocaleString('en-US', {maximumFractionDigits:0}) + ".00");
    }

    var total_all = 0;
    $("input[name='total[]']").each(function(index, value) {
      var total_row = parseFloat($(this).val());
      total_all = total_all + total_row + 0;
    });

    var vat = Number($("input[name=vat]").val());
    var discount = Number($("input[name=discount]").val());
    console.log(total_all);
    total_all = total_all + vat + 0;
    console.log(total_all);
    total_all = total_all - discount + 0;
    console.log(total_all);
    // $(input).closest('form').find("span[name=total_all]").text(total_all);
    $("#total_all").text(total_all.toLocaleString('en-US', {maximumFractionDigits:0}) + ".00");
  }

  function deletecost(id, btn) {
    var valid = confirm('Are you sure to delete this? You cannot revert it later.');
    if (valid == true) {
      $.ajax({
        url: "<?php echo base_url(); ?>shipment/shipment_cost_delete_process/" + id,
        type: "post",
        success: function(data) {
          $(btn).closest("tr").remove();
          showSuccessToast('Your Shipment Cost data has been Delete!');
        }
      });
    }
  }
</script>