<style type="text/css">
    body{
        background-color: #ffffff;
    }
    [class*="span"] {
        float: left;
        min-height: 1px;
        margin-left: 5px;
    }
    .span {
        width: 220px;
    }
    .sign{
        height: 100px;
        border-bottom: 1px solid #000000;
    }
    .text-center{
        text-align: center
    }
    div h2{
      display:block;
      font-weight:bold;
      padding-bottom: 0px;
      padding-top: 0px;
      margin:0px;
    }
    div h4{
      display:block;
      font-weight:bold;
      padding-bottom: 0px;
      padding-top: 0px;
      margin:0px;
    }
</style>
<body onclick='window.print()'>
<br><br>

<div align="left">
    <table>
        <tr>
            <td width="100%" colspan="7">
                <div align="center">
                    <p><strong>Laporan Data Transfer Antar Balai</strong></p>
                </div>
            </td>
        </tr>
        <tr>
            <td width="100%" colspan="7">
                <div align="center">
                    <p><strong>&nbsp</strong></p>
                </div>
            </td>
        </tr>
        <tr>
            <td width="100%" colspan="7">
                <div align="center">
                    <p><strong><hr></strong></p>
                </div>
            </td>
        </tr>
        <tr>
            <td width="10%"><strong>Balai </strong></td>
            <td width="10%"><strong>IP Address</strong></td>
            <td width="10%"><strong>Nama</strong></td>
            <td width="10%"><strong>Ukuran </strong></td>
            <td width="10%"><strong>Jenis </strong></td>
            <td width="10%"><strong>Status </strong></td>
            <td width="10%"><strong>Waktu</strong></td>
        </tr>
        <?php
        if (isset($data_pengamatan)){
          foreach($data_pengamatan as $row){
        ?>

        <tr>
            <td width="10%"><strong></strong> <?php echo $row->nm_balai?> </td>
            <td width="10%"><strong></strong> <?php echo $row->address_topologi?> </td>
            <td width="10%"><strong></strong> <?php echo $row->nm_pengamatan?></td>
            <td width="10%"><strong></strong> <?php echo $row->ukuran_pengamatan?> </td>
            <td width="10%"><strong></strong> <?php echo $row->jenis_pengamatan?></td>
            <td width="10%"><strong></strong> <?php echo $row->status_pengamatan?> </td>
            <td width="10%"><strong></strong> <?php echo $row->waktu_pengamatan?> </td>
        </tr>
        <?php }
          }
        ?>
        <tr>
            <td width="100%" colspan="7">
                <div align="center">
                    <p><strong>&nbsp</strong></p>
                </div>
            </td>
        </tr>

    </table>

    <div class="span center" style="float: right">
        <h5 class="text-center">Staff Admin</h5>
        <div class="sign"></div>
        <h6 class="text-center">Aldy S.Kom.Mkom</h6>
    </div>
</body>