$(document).ready(() => {

	window.pageNow = $('#pageGetter').attr('data-page');

	switch (pageNow) {
		case 'settings':
			window.inputs = {};
			let inputsArr = $('#projectsettings input').toArray();
			inputsArr.forEach((item) => {
				window.inputs[$(item).attr('id')] = $(item).val();

			})
			break;
	}
});

/* Settings */

function saveData(){
	let inputsArr = $('#projectsettings input').toArray();
	let postRequests = []; // Array with Promise

	inputsArr.forEach((item) => {
		let id = $(item).attr('id');
		let val = $(item).val();

				if(window.inputs[id] != val){
					let request = $.post('./../api.php', {method:'config.set', type:encodeURI(id), value:encodeURI(val)});
					postRequests.push(request);
				}
				
			})

		if(postRequests.length==0) return false;

		Promise.all(postRequests).then((r)=>(r == 1) ? refresh() : alert(r));
}


function setStatusSite(status){
	$.post('./../api.php', {method:'config.set', type:'status', value:status}).then(()=>{
		location.href=location.href
	});
}

function enablePlatform(mode){
$.post('./../api.php', {method:'config.set', type:'mode', value:mode}).then(()=>{
		location.href=location.href
	});
}



function logOut(){
	$.post('./../api.php', {method:'account.logout'}).then(()=>location.href=location.href)
}

function refresh(){
	window.location.href=window.location.href;
};

/** Blocks **/

