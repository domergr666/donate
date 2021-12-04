<script>
	window.goodsInfo = {};
</script>

<?php
if(isset($_GET['ajax']) && $_GET['ajax']==1){
      include "../../libs/functions.php";


        ?>

        <thead>
                <tr>
          <tr>
              <th>Имя</th>
              <th>Команда</th>
              <th>Цена</th>
              <th>Действие</th>
          </tr>
                </tr>
                </thead>
                <tbody>
    <?php 


        $rows = $mysqli->query("SELECT * FROM `privileges` ORDER BY id ASC");
        while($row = $rows->fetch_assoc()){
          ?>
          <script>
            window.goodsInfo[<?=$row['id']?>] = {description:`<?=$row['description']?>`, section:`<?=$row['section']?>`};
          </script>
          <?php
          echo "<tr id='tr".$row['id']."'>
            <td>".$row['name']."</td>
            <td>".$row['command']."</td>
            <td>".$row['price']."</td>
            <td><svg style='cursor:pointer;' onclick='deleteDonate(".$row['id'].")' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z'/></svg>
            <svg style='cursor:pointer;'  onclick='__editTable(".$row['id'].")' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z\"/></svg>
            <i class='material-icons buttonUp' style='cursor:pointer;'>keyboard_arrow_up</i>
            <i class='material-icons buttonDown' style='cursor:pointer;'>keyboard_arrow_down</i>
            </td>
          </tr>";
        }
        ?>
                </tbody>

        <?php
        die();

    } 

?>

<div class="col-md-6 col-xl-9">
<form id="projectmain" name="projectmain" action="975" method="post">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title text-left">Товары</h3>
            <div class="block-options">
                <div class="block-options">
                    <button type="button" onclick="__showModalWindow()" class="btn btn-sm btn-alt-success text-uppercase ">
                        Добавить товар
                    </button>

                    <button type="button" onclick="saveMovedGoods()" style="display: none;" id="saveGoodsButton" class="btn btn-sm btn-alt-success text-uppercase ">
                       Cохранить
                    </button>
                </div>
            </div>
        </div>
        <div class="block-content p-5">
            <table class="table table-hover table-sm table-vcenter text-left js-dataTable-full" id="project_goods">
                <thead>
                <tr>
          <tr>
              <th>Имя</th>
              <th>Команда</th>
              <th>Цена</th>
              <th>Действие</th>
          </tr>
                </tr>
                </thead>
                <tbody>
		<?php 


        $rows = $mysqli->query("SELECT * FROM `privileges` ORDER BY id ASC");
        while($row = $rows->fetch_assoc()){
        	?>
        	<script>
        		window.goodsInfo[<?=$row['id']?>] = {description:`<?=$row['description']?>`, section:`<?=$row['section']?>`};
        	</script>
        	<?php
          echo "<tr id='tr".$row['id']."'>
            <td>".$row['name']."</td>
            <td>".$row['command']."</td>
            <td>".$row['price']."</td>
            <td><svg style='cursor:pointer;' onclick='deleteDonate(".$row['id'].")' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z'/></svg>
            <svg style='cursor:pointer;'  onclick='__editTable(".$row['id'].")' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z\"/></svg>
            <i class='material-icons buttonUp' style='cursor:pointer;'>keyboard_arrow_up</i>
            <i class='material-icons buttonDown' style='cursor:pointer;'>keyboard_arrow_down</i>
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