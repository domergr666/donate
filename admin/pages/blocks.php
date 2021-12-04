<div class="col-md-6 col-xl-9">
    <script>window.blocksContent = {};</script>
<form id="projectmain" name="projectmain" action="975" method="post">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title text-left">Верхние блоки</h3>
            <div class="block-options">
                <div class="block-options">
                    <button type="button" onclick="addBlock('headers')" class="btn btn-sm btn-alt-success text-uppercase openform">
                        Добавить блок
                    </button>
                </div>
            </div>
        </div>
        <div class="block-content p-5">
            <table class="table table-hover table-sm table-vcenter text-left js-dataTable-full" id="blocks">
                <thead>
					<tr>
						<th>Имя блока</th>
						<th>Действие</th>
					</tr>
                </thead>
				<tbody>
        <?php 
        $rows = getHeaders();
        while($row = $rows->fetch_assoc()){
             
          echo "<tr id='trheaders".$row['id']."' data-name='".$row['name']."'>
            <td>".$row['name']."</td>
            <td><i class='material-icons' style='cursor:pointer;' onclick='editBlock(".$row['id'].", \"headers\")'>edit</i> <svg style='cursor:pointer;' onclick='deleteBlock(".$row['id'].", \"headers\")' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z'/></svg>

            </td>
          </tr>";

          echo "<script>window.blocksContent['trheaders".$row['id']."'] = `".htmlspecialchars($row['html'])."`</script>";
        }
        ?>         
				</tbody>
            </table>
        </div>
    </div>
</form>

<form id="projectmain" name="projectmain" action="975" method="post">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title text-left">Нижние блоки</h3>
            <div class="block-options">
                <div class="block-options">
                    <button type="button" onclick="addBlock('footers')" class="btn btn-sm btn-alt-success text-uppercase openform">
                        Добавить блок
                    </button>
                </div>
            </div>
        </div>
        <div class="block-content p-5">
            <table class="table table-hover table-sm table-vcenter text-left js-dataTable-full" id="blocks">
                <thead>
					<tr>
						<th>Имя блока</th>
						<th>Действие</th>
					</tr>
                </thead>
				<tbody>
        <?php 
        $rows = getFooters();
        while($row = $rows->fetch_assoc()){
            echo "<script>window.blocksContent['trfooters".$row['id']."'] = `".htmlspecialchars($row['html'])."`</script>";
          echo "<tr id='trfooters".$row['id']."' data-name='".$row['name']."'>
            <td>".$row['name']."</td>
            <td><i class='material-icons' style='cursor:pointer;' onclick='editBlock(".$row['id'].", \"footers\")'>edit</i> <svg style='cursor:pointer;' onclick='deleteBlock(".$row['id'].", \"footers\")' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z'/></svg>

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