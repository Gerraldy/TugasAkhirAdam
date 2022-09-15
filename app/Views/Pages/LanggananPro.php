<?= $this->extend('Layout/Template'); ?>
<?= $this->section('content'); ?>
 <div class="k-d-flex k-justify-content-center" style="padding-top: 54px;">
Harga : <select id="harga" name="Harga" style="" >
  <option value="5000">Rp. 5.000 - 1 Hari</option>
  <option value="15000">Rp. 15.000 - 7 Hari</option>
  <option value="100000">Rp. 100.000 - 365 Hari</option>
</select>

<button class="k-button btn-primary" id="Bayar" type="button" name="btnBayar">Bayar</button>
</div>
<form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
    <input type="hidden" name="result_type" id="result-type" value=""></div>
    <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-OybFDflf8msE8vR1"></script>
<script>

$(document).ready(function() {
  $("#harga").kendoDropDownList();
  var harga = $("#harga").data('kendoDropDownList');

  $("#Bayar").click(function() {
    //alert(harga.value());
    $.ajax({
      type: "get",
      url: "<?= base_url('public/Pembayaran/BayarPro') ?>",
      data: {
        ID_Memers: <?=$user['ID_Memers'] ?>,
        Email: "<?=$user['Email'] ?>",
        TotalHarga: harga.value()
      },
      success: function(data) {

      //  alert(JSON.stringify(data));
        console.log('token = '+data);

        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });


});
</script>
<?= $this->endSection();  ?>
