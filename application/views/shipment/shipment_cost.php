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
        <div class="card">
          <div class="card-body overflow-auto">
            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="main-agent-tab" data-toggle="tab" href="#main-agent" role="tab" aria-controls="main-agent" aria-selected="true">Main Agent Cost</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="secondary-agent-tab" data-toggle="tab" href="#secondary-agent" role="tab" aria-controls="secondary-agent" aria-selected="false">Secondary Agent Cost</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="costumer-tab" data-toggle="tab" href="#costumer" role="tab" aria-controls="costumer" aria-selected="false">Costumer Cost</a>
              </li>
            </ul>
            <br>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="main-agent" role="tabpanel" aria-labelledby="main-agent-tab">
                <h6 class="font-weight-bold border-bottom">Main Agent Detail</h6>
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label>Agent Name :</label>
                      <div class="font-weight-bold"><?php echo $shipment_list['main_agent_name'] ?></div>
                    </div>
                    <div class="form-group">
                      <label>MAWB / MBL :</label>
                      <div class="font-weight-bold"><?php echo $shipment_list['main_agent_mawb_mbl'] ?></div>
                    </div>
                    <div class="form-group">
                      <label>Carrier :</label>
                      <div class="font-weight-bold"><?php echo $shipment_list['main_agent_carrier'] ?></div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label>Voyage/Flight No.</label>
                      <div class="font-weight-bold"><?php echo $shipment_list['main_agent_voyage_flight_no'] ?></div>
                    </div>
                    <div class="form-group">
                      <label>Voyage/Flight Date :</label>
                      <div class="font-weight-bold"><?php echo ($shipment_list['main_agent_voyage_flight_date'] == "0000-00-00" ? "" : $shipment_list['main_agent_voyage_flight_date']) ?></div>
                    </div>
                  </div>
                </div>
                
                <?php
                  $total_all = 0;
                ?>
                <form action="<?php echo base_url() ?>shipment/shipment_cost_process" method="POST">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $shipment_list['id']; ?>">
                  <input type="hidden" class="form-control" name="category" value="main-agent">
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
                      <?php if(count($main_agent) < 1) : ?>
                      <tr>
                        <td>
                          <input type="text" class="form-control" name="description[]" required>
                          <input type="hidden" class="form-control" name="id_cost[]">
                        </td>
                        <td><input type="number" class="form-control" value="0" oninput="get_total(this)" name="qty[]"></td>
                        <td>
                          <select class="form-control" name="uom[]" required>
                            <option value="">-- Select One --</option>
                            <option value="Kg">Kg</option>
                            <option value="M3">M3</option>
                            <option value="Set">Set</option>
                            <option value="Trip">Trip</option>
                            <option value="Pallet">Pallet</option>
                            <option value="Persentage">Persentage</option>
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
                        <td><input type="number" class="form-control" value="0" oninput="get_total(this)" name="unit_price[]"></td>
                        <td><input type="number" class="form-control" value="0" name="subtotal[]" readonly></td>
                        <td><input type="number" class="form-control" value="0" oninput="get_total(this)"name="exchange_rate[]"></td>
                        <td><input type="number" class="form-control" value="0" name="total[]" readonly></td>
                        <td><textarea class="form-control" name="remarks[]" placeholder="..."></textarea></td>
                        <td>
                          <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                        </td>
                      </tr>
                      <?php endif; ?>
                      <?php 
                        foreach ($main_agent as $key => $value) : 
                          $total_all += $value['qty']*$value['unit_price']*$value['exchange_rate'];
                      ?>
                        <tr>
                        <td>
                          <input type="text" class="form-control" name="description[]" value="<?php echo $value['description'] ?>" required>
                          <input type="hidden" class="form-control" name="id_cost[]" value="<?php echo $value['id'] ?>">
                        </td>
                        <td><input type="number" class="form-control" value="<?php echo $value['qty'] ?>" oninput="get_total(this)" name="qty[]"></td>
                        <td>
                          <select class="form-control" name="uom[]" required>
                            <option value="">-- Select One --</option>
                            <option value="Kg" <?php echo ($value['uom'] == "Kg" ? 'selected' : '') ?>>Kg</option>
                            <option value="M3" <?php echo ($value['uom'] == "M3" ? 'selected' : '') ?>>M3</option>
                            <option value="Set" <?php echo ($value['uom'] == "Set" ? 'selected' : '') ?>>Set</option>
                            <option value="Trip" <?php echo ($value['uom'] == "Trip" ? 'selected' : '') ?>>Trip</option>
                            <option value="Pallet" <?php echo ($value['uom'] == "Pallet" ? 'selected' : '') ?>>Pallet</option>
                            <option value="Persentage" <?php echo ($value['uom'] == "Persentage" ? 'selected' : '') ?>>Persentage</option>
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
                        <td><input type="number" class="form-control" value="<?php echo $value['unit_price'] ?>" oninput="get_total(this)" name="unit_price[]"></td>
                        <td><input type="number" class="form-control" value="<?php echo $value['qty']*$value['unit_price'] ?>" name="subtotal[]" readonly></td>
                        <td><input type="number" class="form-control" value="<?php echo $value['exchange_rate'] ?>" oninput="get_total(this)"name="exchange_rate[]"></td>
                        <td><input type="number" class="form-control" value="<?php echo $value['qty']*$value['unit_price']*$value['exchange_rate'] ?>" name="total[]" readonly></td>
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
                  <div class="row clearfix">
                    <div class="col-md">
                      <h5 class="font-weight-bold">Total All : IDR <span name="total_all"><?php echo $total_all ?></span></h5>
                    </div>
                    <div class="col-md text-right">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
                
              </div>
              <div class="tab-pane fade" id="secondary-agent" role="tabpanel" aria-labelledby="secondary-agent-tab">
                <h6 class="font-weight-bold border-bottom">Secondary Agent Detail</h6>
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label>Agent Name :</label>
                      <div class="font-weight-bold"><?php echo $shipment_list['secondary_agent_name'] ?></div>
                    </div>
                    <div class="form-group">
                      <label>MAWB / MBL :</label>
                      <div class="font-weight-bold"><?php echo $shipment_list['secondary_agent_mawb_mbl'] ?></div>
                    </div>
                    <div class="form-group">
                      <label>Carrier :</label>
                      <div class="font-weight-bold"><?php echo $shipment_list['secondary_agent_carrier'] ?></div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label>Voyage/Flight No.</label>
                      <div class="font-weight-bold"><?php echo $shipment_list['secondary_agent_voyage_flight_no'] ?></div>
                    </div>
                    <div class="form-group">
                      <label>Voyage/Flight Date :</label>
                      <div class="font-weight-bold"><?php echo ($shipment_list['secondary_agent_voyage_flight_date'] == "0000-00-00" ? "" : $shipment_list['secondary_agent_voyage_flight_date']) ?></div>
                    </div>
                  </div>
                </div>
                <?php
                  $total_all = 0;
                ?>
                <form action="<?php echo base_url() ?>shipment/shipment_cost_process" method="POST">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $shipment_list['id']; ?>">
                  <input type="hidden" class="form-control" name="category" value="secondary-agent">
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
                      <?php if(count($secondary_agent) < 1) : ?>
                      <tr>
                        <td>
                          <input type="text" class="form-control" name="description[]" required>
                          <input type="hidden" class="form-control" name="id_cost[]">
                        </td>
                        <td><input type="number" class="form-control" value="0" oninput="get_total(this)" name="qty[]"></td>
                        <td>
                          <select class="form-control" name="uom[]" required>
                            <option value="">-- Select One --</option>
                            <option value="Kg">Kg</option>
                            <option value="M3">M3</option>
                            <option value="Set">Set</option>
                            <option value="Trip">Trip</option>
                            <option value="Pallet">Pallet</option>
                            <option value="Persentage">Persentage</option>
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
                        <td><input type="number" class="form-control" value="0" oninput="get_total(this)" name="unit_price[]"></td>
                        <td><input type="number" class="form-control" value="0" name="subtotal[]" readonly></td>
                        <td><input type="number" class="form-control" value="0" oninput="get_total(this)"name="exchange_rate[]"></td>
                        <td><input type="number" class="form-control" value="0" name="total[]" readonly></td>
                        <td><textarea class="form-control" name="remarks[]" placeholder="..."></textarea></td>
                        <td>
                          <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                        </td>
                      </tr>
                      <?php endif; ?>
                      <?php 
                        foreach ($secondary_agent as $key => $value) : 
                          $total_all += $value['qty']*$value['unit_price']*$value['exchange_rate'];
                      ?>
                        <tr>
                        <td>
                          <input type="text" class="form-control" name="description[]" value="<?php echo $value['description'] ?>" required>
                          <input type="hidden" class="form-control" name="id_cost[]" value="<?php echo $value['id'] ?>">
                        </td>
                        <td><input type="number" class="form-control" value="<?php echo $value['qty'] ?>" oninput="get_total(this)" name="qty[]"></td>
                        <td>
                          <select class="form-control" name="uom[]" required>
                            <option value="">-- Select One --</option>
                            <option value="Kg" <?php echo ($value['uom'] == "Kg" ? 'selected' : '') ?>>Kg</option>
                            <option value="M3" <?php echo ($value['uom'] == "M3" ? 'selected' : '') ?>>M3</option>
                            <option value="Set" <?php echo ($value['uom'] == "Set" ? 'selected' : '') ?>>Set</option>
                            <option value="Trip" <?php echo ($value['uom'] == "Trip" ? 'selected' : '') ?>>Trip</option>
                            <option value="Pallet" <?php echo ($value['uom'] == "Pallet" ? 'selected' : '') ?>>Pallet</option>
                            <option value="Persentage" <?php echo ($value['uom'] == "Persentage" ? 'selected' : '') ?>>Persentage</option>
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
                        <td><input type="number" class="form-control" value="<?php echo $value['unit_price'] ?>" oninput="get_total(this)" name="unit_price[]"></td>
                        <td><input type="number" class="form-control" value="<?php echo $value['qty']*$value['unit_price'] ?>" name="subtotal[]" readonly></td>
                        <td><input type="number" class="form-control" value="<?php echo $value['exchange_rate'] ?>" oninput="get_total(this)"name="exchange_rate[]"></td>
                        <td><input type="number" class="form-control" value="<?php echo $value['qty']*$value['unit_price']*$value['exchange_rate'] ?>" name="total[]" readonly></td>
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
                  <div class="row clearfix">
                    <div class="col-md">
                      <h5 class="font-weight-bold">Total All : IDR <span name="total_all"><?php echo $total_all ?></span></h5>
                    </div>
                    <div class="col-md text-right">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="costumer" role="tabpanel" aria-labelledby="costumer-tab">
                <?php
                  $total_all = 0;
                ?>
                <form action="<?php echo base_url() ?>shipment/shipment_cost_process" method="POST">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $shipment_list['id']; ?>">
                  <input type="hidden" class="form-control" name="category" value="costumer">
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
                        <td><input type="number" class="form-control" value="0" oninput="get_total(this)" name="qty[]"></td>
                        <td>
                          <select class="form-control" name="uom[]" required>
                            <option value="">-- Select One --</option>
                            <option value="Kg">Kg</option>
                            <option value="M3">M3</option>
                            <option value="Set">Set</option>
                            <option value="Trip">Trip</option>
                            <option value="Pallet">Pallet</option>
                            <option value="Persentage">Persentage</option>
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
                        <td><input type="number" class="form-control" value="0" oninput="get_total(this)" name="unit_price[]"></td>
                        <td><input type="number" class="form-control" value="0" name="subtotal[]" readonly></td>
                        <td><input type="number" class="form-control" value="0" oninput="get_total(this)"name="exchange_rate[]"></td>
                        <td><input type="number" class="form-control" value="0" name="total[]" readonly></td>
                        <td><textarea class="form-control" name="remarks[]" placeholder="..."></textarea></td>
                        <td>
                          <button type="button" class="btn btn-primary" onclick="addrow(this)"><i class="fas fa-plus m-0"></i></button>
                        </td>
                      </tr>
                      <?php endif; ?>
                      <?php 
                        foreach ($costumer as $key => $value) : 
                          $total_all += $value['qty']*$value['unit_price']*$value['exchange_rate'];
                      ?>
                        <tr>
                        <td>
                          <input type="text" class="form-control" name="description[]" value="<?php echo $value['description'] ?>" required>
                          <input type="hidden" class="form-control" name="id_cost[]" value="<?php echo $value['id'] ?>">
                        </td>
                        <td><input type="number" class="form-control" value="<?php echo $value['qty'] ?>" oninput="get_total(this)" name="qty[]"></td>
                        <td>
                          <select class="form-control" name="uom[]" required>
                            <option value="">-- Select One --</option>
                            <option value="Kg" <?php echo ($value['uom'] == "Kg" ? 'selected' : '') ?>>Kg</option>
                            <option value="M3" <?php echo ($value['uom'] == "M3" ? 'selected' : '') ?>>M3</option>
                            <option value="Set" <?php echo ($value['uom'] == "Set" ? 'selected' : '') ?>>Set</option>
                            <option value="Trip" <?php echo ($value['uom'] == "Trip" ? 'selected' : '') ?>>Trip</option>
                            <option value="Pallet" <?php echo ($value['uom'] == "Pallet" ? 'selected' : '') ?>>Pallet</option>
                            <option value="Persentage" <?php echo ($value['uom'] == "Persentage" ? 'selected' : '') ?>>Persentage</option>
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
                        <td><input type="number" class="form-control" value="<?php echo $value['unit_price'] ?>" oninput="get_total(this)" name="unit_price[]"></td>
                        <td><input type="number" class="form-control" value="<?php echo $value['qty']*$value['unit_price'] ?>" name="subtotal[]" readonly></td>
                        <td><input type="number" class="form-control" value="<?php echo $value['exchange_rate'] ?>" oninput="get_total(this)"name="exchange_rate[]"></td>
                        <td><input type="number" class="form-control" value="<?php echo $value['qty']*$value['unit_price']*$value['exchange_rate'] ?>" name="total[]" readonly></td>
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
                  <div class="row clearfix">
                    <div class="col-md">
                      <h5 class="font-weight-bold">Total All : IDR <span name="total_all"><?php echo $total_all ?></span></h5>
                    </div>
                    <div class="col-md text-right">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

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

  function get_total(input) {
    var row = $(input).closest('tr');
    var qty = $(row).find("input[name='qty[]']").val();
    var unit_price = $(row).find("input[name='unit_price[]']").val();
    var subtotal = qty * unit_price;
    $(row).find("input[name='subtotal[]']").val(subtotal);

    var exchange_rate = $(row).find("input[name='exchange_rate[]']").val();
    var total = subtotal * exchange_rate;
    $(row).find("input[name='total[]']").val(total);

    var total_all = 0;
    $("input[name='total[]']").each(function(index, value) {
      var total_row = parseInt($(this).val());
      total_all = total_all + total_row + 0;
    });

    $(input).closest('form').find("span[name=total_all]").text(total_all);
    // $("#total_all").text(total_all);
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