<div class="col-md-6 col-xl-9">
    <script>window.blocksContent = {};</script>
<form id="projectmain" name="projectmain" action="975" method="post">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title text-left">Консоль</h3>
        </div>
        <div class="block-content p-5" style="overflow: hidden;background-color: #1d1c1c;">
            <div class="console">
            </div>
            <div class="consoleInput">
            	<input type="text" name="command" id="command" placeholder="Команда" style="float: left; width: 90%;">
            	<button onclick="sendRconFromConsole($('#command').val()); return false;">Go</button>
            </div>
            
        </div>
    </div>
</form>

</div>
<script>
	/*$(document).keyup((key) => {
		if (key.originalEvent.code == 'Enter') {
			sendRconFromConsole($('#command').val());
		}
	});*/

	async function sendRconFromConsole(command){
		if(!command) return;

		$('#command').val('');
		$('.console').append(`<p class="command">> ${command}</p>`);
		let response = await sendRconCommand(command);
		if(command == 'hack server') response = 'Данной функции никогда не будет =)';
		$('.console').append(`<p class="response">${response}</p>`);

		$('.console').scrollTop(99999999999999999999999);
	}
</script>
<style>
    .console{
       position: relative;
    width: 103%;
    top: -6px;
    left: -5px;
    height: 602px;
    background-color: #1d1c1c;
    overflow: auto;
    }
    .console .command:first-child{
    top: 10px;
    }
    .console .command{
        left: 10px;
         clear: both;
            font-size: 14px;
                color: #e4e4e4;
                    float: left;
                        position: relative;
                            display: inline-block;
                            top: 0px;

                                                   }


    .console .response{
    clear: both;
    font-size: 14px;
    color: #54c711;
    float: left;
    position: relative;
    display: inline-block;
    left: 10px;
    top:-10px;
    }
    


    .consoleInput{
    width: 103%;
    position: relative;
    float: left;
    left: -6px;
    top: -6px;
    }
</style>