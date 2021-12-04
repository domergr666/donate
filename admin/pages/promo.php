<div class="col-md-6 col-xl-9">
<form id="projectmain" name="projectmain" action="975" method="post">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title text-left">Промокоды</h3>
            <div class="block-options">
                <div class="block-options">
                    <button type="button" onclick="__modalPromo()" class="btn btn-sm btn-alt-success text-uppercase openform">
                        Добавить промокод
                    </button>
                </div>
            </div>
        </div>
        <div class="block-content p-5">
            <table class="table table-hover table-sm table-vcenter text-left js-dataTable-full" id="project_goods">
                <thead>
					<tr>
						<th>Промокод</th>
						<th>Скидка</th>
						<th>Кол-во использований</th>
						<th>Действие</th>
					</tr>
                </thead>
				<tbody>
        <?php 
        $rows = $mysqli->query("SELECT * FROM `promo`");
        while($row = $rows->fetch_assoc()){
          echo "
            <td>".$row['promo']."</td>
            <td>".$row['discount']."</td>
			<td>".$row['count']."</td>
            <td><svg style='cursor:pointer;' onclick='deletePromo(".$row['id'].")' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z'/></svg>

            </td>
          </tr>";
        }
        ?>         
				</tbody>
            </table>
        </div>
    </div>
</form>
</div>