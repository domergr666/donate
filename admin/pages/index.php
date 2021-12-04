<div class="col-md-6 col-xl-9">
                                        <!--            <div class="row mb-5">
                                <div class="col-md-6 col-xl-4 pr-5">
                                    <div class="block block-link-shadow text-right mb-0 rounded" style="height: 96px;">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="float-left mt-10">
                                                <i class="fas fa-ruble-sign fa-3x text-earth-light"></i>
                                            </div>
                                            <div class="font-size-h3 font-w600">0.00 <i class="fas fa-ruble-sign" aria-hidden="true"></i></div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">ДОХОД ЗА СЕГОДНЯ (0 <i class="fas fa-shopping-basket"></i>)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 pl-5 pr-5">
                                    <div class="block block-link-shadow text-right mb-0 rounded" style="height: 96px;">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="float-left mt-10">
                                                <i class="fas fa-ruble-sign fa-3x text-earth-light"></i>
                                            </div>
                                            <div class="font-size-h3 font-w600">0.00 <i class="fas fa-ruble-sign" aria-hidden="true"></i></div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">ДОХОД ЗА НЕДЕЛЮ (0 <i class="fas fa-shopping-basket"></i>)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 pl-5">
                                    <div class="block block-link-shadow text-right mb-0 rounded" style="height: 96px;">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="float-left mt-10">
                                                <i class="fas fa-ruble-sign fa-3x text-earth-light"></i>
                                            </div>
                                            <div class="font-size-h3 font-w600">0.00 <i class="fas fa-ruble-sign" aria-hidden="true"></i></div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">ДОХОД ЗА МЕСЯЦ (0 <i class="fas fa-shopping-basket"></i>)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        -->
    <form id="projectmain" name="projectmain" action="975" method="post">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title text-left">Последние платежи</h3>
            </div>
            <div class="block-content p-5">
                <table class="table table-hover table-sm table-vcenter text-left">
                    <thead>
                        <tr>
              <th>Донат</th>
              <th>Никнейм</th>
			  <th>Команда</th>
			  <th>intid</th>
			  <th>Стоимость</th>
              <th>Статус покупки</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php 
        $rows = $mysqli->query("SELECT * FROM `data` ORDER BY time ASC");
        while($row = $rows->fetch_assoc()){
          echo "
            <td>".$row['donate']."</td>
            <td>".$row['nickname']."</td>
			<td>".$row['command']."</td>
			<td>".$row['intid']."</td>
			<td>".$row['amount']."</td>
			<td>".$row['status']."</td>
          </tr>";
        }
        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>

</div>