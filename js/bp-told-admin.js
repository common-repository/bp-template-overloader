/*
* @package bp-Template-Overloader
*/

//To Do: Add file path variable to the callback response and display it in the updated filepath location

// Setup variables for button images
jQuery(document).ready(function($){
	tioEnableBut = new Image();
	tioEnableBut.src = bp_told_translate.pluginUrl + '/images/green-e.png';
	disableBut = new Image();
	disableBut.src = bp_told_translate.pluginUrl + "/images/red-d.png";
	tdoEnableBut = new Image();
	tdoEnableBut.src = bp_told_translate.pluginUrl + "/images/blue-e.png";
	deleteBut = new Image();
	deleteBut.src = bp_told_translate.pluginUrl + "/images/red-x.png";
	viewBut = new Image();
	viewBut.src = bp_told_translate.pluginUrl + "/images/red-v.png";
	migrateBut = new Image();
	migrateBut.src = bp_told_translate.pluginUrl + "/images/green-m.png";
	restoreBut = new Image();
	restoreBut.src = bp_told_translate.pluginUrl + "/images/green-r.png";
	compareBut = new Image();
	compareBut.src = bp_told_translate.pluginUrl + "/images/blue-c.png";
	loadingBut = new Image();
	loadingBut.src = bp_told_translate.pluginUrl + "/images/loading.gif";
	nouCompareBut = new Image();
	nouCompareBut.src = bp_told_translate.pluginUrl + "/images/green-c.png";

	function tioEnable(e){

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var tioButton = e.target;		
		var path = tioButton.name;
		var tdoButton = document.getElementById(e.target.name + "-tdoButton");
		var tioToTdoButton = document.getElementById(path + "-tioToTdo");
		var tdoToTioButton = document.getElementById(path + "-tdoToTio");
		var tioCompButton = document.getElementById(path + '-tioCompButton');
		var olStatus = document.getElementById(path + "-Status");
		var olFilepath = document.getElementById(path + "-filePath");
		tioButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tio_enable"
			},
			success : function(data) {
				tdoButton.style.visibility ="hidden";
				tioButton.src=disableBut.src;
				tioButton.alt=bp_told_translate.tioDisableOverload;
				tioButton.title=bp_told_translate.tioDisableOverload;
				tioToTdoButton.alt=bp_told_translate.tioToTdoMigrate;
				tioToTdoButton.title=bp_told_translate.tioToTdoMigrate;
				tioButton.classList.remove('tio-enable');
				$('.tio-enable').off().on('click', tioEnable);
				tioButton.classList.remove('tio-restore');
				$('.tio-restore').off().on('click', tioRestore);
				tioButton.classList.add('tio-disable');
				$('.tio-disable').off().on('click', tioDisable);
				tioToTdoButton.classList.remove('tio-delete');
				$('.tio-delete').off().on('click', tioDelete);
				tioToTdoButton.classList.add('tio-to-tdo');
				$('.tio-to-tdo').off().on('click', tioToTdoMigrate);
				tioCompButton.style.visibility = 'visible';
				tioCompButton.alt=bp_told_translate.tioCompare;
				tioCompButton.title=bp_told_translate.tioCompare;
				tioCompButton.classList.add('tio-comp');
				tioCompButton.classList.remove('tio-dis-comp');
				$('.tio-dis-comp').off().on('click', tioDisCompare);
				$('.tio-comp').off().on('click',tioCompare);
				olStatus.innerHTML = bp_told_translate.tioThemeOverload;
				olFilepath.innerHTML = bp_told_translate.tioEnabled + data + bp_told_translate.completed;
				tioToTdoButton.src=migrateBut.src;
				tioToTdoButton.style.visibility = "visible";
			},
			error : function(data){
				console.log(data);
				console.log("failed");
			}
		});

	}

	$('.tio-enable').off().on('click', tioEnable);

	function tioDisable(e){

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var tioButton = e.target;		
		var path = tioButton.name;
		var tioToTdoButton = document.getElementById(path + '-tioToTdo');
		var tdoToTioButton = document.getElementById(path + '-tdoToTio');
		var tioCompButton = document.getElementById(path + '-tioCompButton');
		var tdoCompButton = document.getElementById(path + '-tdoCompButton');
		var olStatus = document.getElementById(path + "-Status");
		var olFilepath = document.getElementById(path + "-filePath");
		var tdoButton = document.getElementById(path + '-tdoButton');
		tioButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tio_disable"
			},
			success : function(data) {
				data=JSON.parse(data);
				if (data[0] == 'None' ) {
					tdoButton.src=tdoEnableBut.src;
					$('.tdo-restore').off().on('click', tdoRestore);
					tdoButton.classList.remove('tdo-disable');
					$('.tdo-disable').off().on('click', tdoDisable);
					tdoButton.classList.add('tdo-enable');
					$('.tdo-enable').off().on('click', tdoEnable);
					tdoButton.alt=bp_told_translate.tdoEnableOverload;
					tdoButton.title=bp_told_translate.tdoEnableOverload;
					tdoToTioButton.style.visibility ='hidden';
				} else {
					tdoButton.src=restoreBut.src;
					tdoButton.classList.add('tdo-restore');
					$('.tdo-restore').add().on('click', tdoRestore);
					tdoButton.classList.remove('tdo-disable');
					$('.tdo-disable').off().on('click', tdoDisable);
					tdoButton.classList.remove('tdo-enable');
					$('.tdo-enable').off().on('click', tdoEnable);
					tdoButton.alt=bp_told_translate.tdoRestoreOverload;
					tdoButton.title=bp_told_translate.tdoRestoreOverload;
					tdoToTioButton.classList.add('tdo-delete');
					$('.tdo-delete').off().on('click', tdoDelete);
					tdoToTioButton.classList.remove('tdo-to-tio');
					$('.tdo-to-tio').off().on('click', tdoToTioMigrate);
					tdoToTioButton.src=deleteBut.src;
					tdoToTioButton.alt=bp_told_translate.tdoDelete;
					tdoToTioButton.title=bp_told_translate.tdoDelete;
					tdoToTioButton.style.visibility ='visible';
					tdoCompButton.style.visibility = 'visible';
					tdoCompButton.alt=bp_told_translate.tdoDisCompare;
					tdoCompButton.title=bp_told_translate.tdoDisCompare;
					tdoCompButton.classList.remove('tdo-comp');
					tdoCompButton.classList.add('tdo-dis-comp');
					$('.tdo-dis-comp').off().on('click', tdoDisCompare);
					$('.tdo-comp').off().on('click',tdoCompare);
				}
				tdoButton.style.visibility ='visible';
				tioButton.src=restoreBut.src;
				tioButton.alt=bp_told_translate.tioRestoreOverload;
				tioButton.title=bp_told_translate.tioRestoreOverload;
				tioButton.classList.remove('tio-disable');
				$('.tio-disable').off().on('click', tioDisable);
				tioButton.classList.remove('tio-enable');
				$('.tio-enable').off().on('click', tioEnable);
				tioButton.classList.add('tio-restore');
				$('.tio-restore').off().on('click', tioRestore);
				tioToTdoButton.src=deleteBut.src;
				tioToTdoButton.alt=bp_told_translate.tioDelete;
				tioToTdoButton.title=bp_told_translate.tioDelete;
				tioToTdoButton.classList.remove('tio-to-tdo');
				$('.tio-to-tdo').off().on('click', tioToTdoMigrate);
				tioToTdoButton.classList.add('tio-delete');
				$('.tio-delete').off().on('click', tioDelete);
				tioCompButton.style.visibility = 'visible';
				tioCompButton.alt=bp_told_translate.tioDisCompare;
				tioCompButton.title=bp_told_translate.tioDisCompare;
				tioCompButton.classList.remove('tio-comp');
				tioCompButton.classList.add('tio-dis-comp');
				$('.tio-dis-comp').off().on('click', tioDisCompare);
				$('.tio-comp').off().on('click',tioCompare);
				olStatus.innerHTML = bp_told_translate.notOverloaded;
				olFilepath.innerHTML = bp_told_translate.tioDisabled + data[1];
				},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tio-disable').off().on('click', tioDisable);
	
	function tioDelete(e){

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var path = e.target.name;
		var tioButton = document.getElementById(path + '-tioButton');
		var tioToTdoButton = document.getElementById(path + '-tioToTdo');
		var tdoToTioButton = document.getElementById(path + '-tdoToTio');
		var tioCompButton = document.getElementById(path + '-tioCompButton');
		var olStatus = document.getElementById(path + "-Status");
		var olFilepath = document.getElementById(path + "-filePath");
		var tdoButton = document.getElementById(path + '-tdoButton');
		tioToTdoButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tio_delete"
			},
			success : function(data) {
				if ( tdoToTioButton.style.visibility == "hidden" ) {
					tdoButton.src=tdoEnableBut.src;
					tdoButton.alt=bp_told_translate.tdoEnableOverload;
					tdoButton.title=bp_told_translate.tdoEnableOverload;
					tdoButton.classList.remove('tdo-restore');
					tdoButton.classList.remove('tdo-disable');
					tdoButton.classList.add('tdo-enable');
					$('.tdo-enable').off().on('click', tdoEnable);
					$('.tdo-disable').off().on('click', tdoDisable);
					$('.tdo-restore').off().on('click', tdoRestore);
				}	
				if ( tdoToTioButton.style.visibility == "visible" ) {
					tdoButton.src=restoreBut.src;
					tdoToTioButton.src=deleteBut.src;
					tdoButton.alt=bp_told_translate.tdoDelete;
					tdoButton.title=bp_told_translate.tdoDelete;
					tdoButton.classList.add('tdo-restore');
					tdoButton.classList.remove('tdo-disable');
					tdoButton.classList.remove('tdo-enable');
					$('.tdo-enable').off().on('click', tdoEnable);
					$('.tdo-disable').off().on('click', tdoDisable);
					$('.tdo-restore').off().on('click', tdoRestore);
					}	
				tdoButton.style.visibility ='visible';
				tioCompButton.style.visibility = 'hidden';
				tioButton.src=tioEnableBut.src;
				tioButton.alt=bp_told_translate.tioEnableOverload;
				tioButton.title=bp_told_translate.tioEnableOverload;
				tioButton.classList.remove('tio-restore');
				$('.tio-restore').off().on('click', tioRestore);
				tioButton.classList.remove('tio-disable');
				$('.tio-disable').off().on('click', tioDelete);
				tioButton.classList.add('tio-enable');
				$('.tio-enable').off().on('click', tioEnable);
				tioToTdoButton.style.visibility ='hidden';
				tioToTdoButton.src=disableBut.src;
				tioToTdoButton.alt=bp_told_translate.tioToTdoMigrate;
				tioToTdoButton.alt=bp_told_translate.tioToTdoMigrate;
				tioToTdoButton.title=bp_told_translate.tioToTdoMigrate;
				tioToTdoButton.classList.remove('tio-delete');
				$('.tio-delete').off().on('click', tioDelete);
				tioToTdoButton.classList.add('tio-to-tdo');
				$('.tio-to-tdo').off().on('click', tioToTdoMigrate);
				olStatus.innerHTML = bp_told_translate.notOverloaded;
				olFilepath.innerHTML = bp_told_translate.tioDeleted;
				},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tio-delete').off().on('click', tioDelete);

	function tioRestore(e){

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var tioButton = document.getElementById(e.target.name + '-tioButton');
		var path = tioButton.name;		
		var tioToTdoButton = document.getElementById(path + '-tioToTdo');
		var tdoToTioButton = document.getElementById(path + '-tdoToTio');
		var tioCompButton = document.getElementById(path + '-tioCompButton');
		var olStatus = document.getElementById(path + "-Status");
		var olFilepath = document.getElementById(path + "-filePath");
		var tdoButton = document.getElementById(path + '-tdoButton');
		tioButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tio_restore"
			},
			success : function(data) {
				tdoButton.style.visibility ='hidden';
				tdoButton.src=tdoEnableBut.src;
				tioButton.src=disableBut.src;
				tioButton.alt=bp_told_translate.tioDisableOverload;
				tioButton.title=bp_told_translate.tioDisableOverload;
				tioButton.classList.remove('tio-restore');
				$('.tio-restore').off().on('click', tioRestore);
				tioButton.classList.remove('tio-delete');
				$('.tio-delete').off().on('click', tioDelete);
				tioButton.classList.add('tio-disable');
				$('.tio-disable').off().on('click', tioDisable);
				tioToTdoButton.style.visibility ='visible';
				tioToTdoButton.src=migrateBut.src;
				tioToTdoButton.alt=bp_told_translate.tioToTdoMigrate;
				tioToTdoButton.title=bp_told_translate.tioToTdoMigrate;
				tioToTdoButton.classList.toggle('tio-delete');
				$('.tio-delete').off().on('click', tioDelete);
				tioToTdoButton.classList.toggle('tio-to-tdo');
				$('.tio-to-tdo').off().on('click', tioToTdoMigrate);
				tioCompButton.style.visibility = 'visible';
				tioCompButton.alt=bp_told_translate.tioCompare;
				tioCompButton.title=bp_told_translate.tioCompare;
				tioCompButton.classList.add('tio-comp');
				tioCompButton.classList.remove('tio-dis-comp');
				$('.tio-dis-comp').off().on('click', tioDisCompare);
				$('.tio-comp').off().on('click',tioCompare);
				olStatus.innerHTML = bp_told_translate.tioThemeOverload;
				olFilepath.innerHTML = bp_told_translate.restoreTio + data + bp_told_translate.completed;
				},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tio-restore').off().on('click', tioRestore);

	function tioToTdoMigrate(e){

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var path = e.target.name;
		var tioButton = document.getElementById(path + '-tioButton');
		var olStatus = document.getElementById(path + "-Status");
		var olFilepath = document.getElementById(path + "-filePath");
		var tioToTdoButton = document.getElementById(path + '-tioToTdo');
		var tioCompButton = document.getElementById(path + '-tioCompButton');
		var tdoCompButton = document.getElementById(path + '-tdoCompButton');
		var tdoButton = document.getElementById(path + '-tdoButton');
		var tdoToTioButton = document.getElementById(path + '-tdoToTio');
		tioToTdoButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tio_to_tdo"
			},
			success : function(data) {
				tioButton.style.visibility='hidden';
				tioToTdoButton.style.visibility = 'hidden';
				tioCompButton.style.visibility = 'hidden';
				tdoToTioButton.src=migrateBut.src;
				tdoToTioButton.alt=bp_told_translate.tdoToTioMigrate;
				tdoToTioButton.title=bp_told_translate.tdotoTioMigrate;
				tdoToTioButton.classList.add('tdo-to-tio');
				tdoToTioButton.classList.remove('tdo-delete');
				$('.tdo-to-tio').off().on('click', tdoToTioMigrate);
				$('.tdo-delete').off().on('click',tdoDelete);
				tdoButton.classList.remove('tdo-enable');
				tdoButton.classList.remove('tdo-restore');
				tdoButton.classList.add('tdo-disable');
				$('.tdo-disable').off().on('click',tdoDisable);
				$('.tdo-restore').off().on('click',tdoRestore);
				$('.tdo-enable').off().on('click',tdoEnable);
				tdoButton.src=disableBut.src;
				tdoButton.alt=bp_told_translate.tdoDisable;
				tdoButton.title=bp_told_translate.tdoDisable;
				tdoCompButton.style.visibility = 'visible';
				tdoCompButton.alt=bp_told_translate.tdoCompare;
				tdoCompButton.title=bp_told_translate.tdoCompare;
				tdoCompButton.classList.add('tdo-comp');
				tdoCompButton.classList.remove('tdo-dis-comp');
				$('.tdo-dis-comp').off().on('click', tdoDisCompare);
				$('.tdo-comp').off().on('click',tdoCompare);
				olStatus.innerHTML = bp_told_translate.tdoThemeOverload;
				olFilepath.innerHTML = bp_told_translate.migrateToTdo + data + bp_told_translate.completed;
				tdoButton.style.visibility='visible';
				tdoToTioButton.style.visibility='visible';
			},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tio-to-tdo').off().on('click', tioToTdoMigrate);
	
	function tdoEnable(e){

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var tdoButton = e.target;		
		var path = tdoButton.name;
		var tdoToTioButton = document.getElementById(path + "-tdoToTio");
		var tioToTdoButton = document.getElementById(path + "-tioToTdo");
		var tdoCompButton = document.getElementById(path + '-tdoCompButton');
		var tioButton = document.getElementById(path + '-tioButton');
		var olStatus = document.getElementById(path + "-Status");
		var olFilepath = document.getElementById(path + "-filePath");
		tdoButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tdo_enable"
			},
			success : function(data) {
				tioButton.style.visibility ="hidden";
				tdoButton.src=disableBut.src;
				tdoButton.alt=bp_told_translate.tdoDisableOverload;
				tdoButton.title=bp_told_translate.tdoDisableOverload;
				tdoButton.classList.remove('tdo-enable');
				$('.tdo-enable').off().on('click', tdoEnable);
				tdoButton.classList.remove('tdo-restore');
				$('.tdo-restore').off().on('click', tdoRestore);
				tdoButton.classList.add('tdo-disable');
				$('.tdo-disable').off().on('click', tdoDisable);
				tdoToTioButton.classList.remove('tdo-delete');
				$('.tdo-delete').off().on('click', tdoDelete);
				tdoToTioButton.classList.add('tdo-to-tio');
				$('.tio-to-tdo').off().on('click', tioToTdoMigrate);
				tdoCompButton.style.visibility = 'visible';
				tdoCompButton.alt=bp_told_translate.tdoCompare;
				tdoCompButton.title=bp_told_translate.tdoCompare;
				tdoCompButton.classList.add('tdo-comp');
				tdoCompButton.classList.remove('tdo-dis-comp');
				$('.tdo-dis-comp').off().on('click', tdoDisCompare);
				$('.tdo-comp').off().on('click',tdoCompare);
				olStatus.innerHTML = bp_told_translate.tioThemeOverload;
				olFilepath.innerHTML = bp_told_translate.tdoEnabled + data + bp_told_translate.completed;
				tdoToTioButton.src=migrateBut.src;
				tdoToTioButton.style.visibility = "visible";
			},
			error : function(data){
				console.log(data);
				console.log("failed");
			}
		});
	}

	$('.tdo-enable').off().on('click', tdoEnable);

	function tdoDisable(e){

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var tdoButton = e.target;		
		var path = tdoButton.name;
		var tdoToTioButton = document.getElementById(path + '-tdoToTio');
		var tioToTdoButton = document.getElementById(path + '-tioToTdo');
		var tdoCompButton = document.getElementById(path + '-tdoCompButton');
		var tioCompButton = document.getElementById(path + '-tioCompButton');
		var olStatus = document.getElementById(path + "-Status");
		var olFilepath = document.getElementById(path + "-filePath");
		var tioButton = document.getElementById(path + '-tioButton');
		tdoButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tdo_disable"
			},
			success : function(data) {
				data=JSON.parse(data);
				if (data[0] == 'None' ) {
					tioButton.src=tioEnableBut.src;
					$('.tio-restore').off().on('click', tioRestore);
					tioButton.classList.remove('tio-disable');
					$('.tio-disable').off().on('click', tioDisable);
					tioButton.classList.add('tio-enable');
					$('.tio-enable').off().on('click', tioEnable);
					tioButton.alt=bp_told_translate.tioEnableOverload;
					tioButton.title=bp_told_translate.tioEnableOverload;
					tioToTdoButton.style.visibility ='hidden';
				} else {
					tioButton.src=restoreBut.src;
					$('.tio-restore').add().on('click', tioRestore);
					tioButton.classList.remove('tio-disable');
					$('.tio-disable').off().on('click', tioDisable);
					tioButton.classList.remove('tio-enable');
					$('.tio-enable').off().on('click', tioEnable);
					tioButton.alt=bp_told_translate.tioRestoreOverload;
					tioButton.title=bp_told_translate.tioRestoreOverload;
					tioToTdoButton.classList.add('tio-delete');
					$('.tio-delete').off().on('click', tioDelete);
					tioToTdoButton.classList.remove('tio-to-tdo');
					$('.tio-to-tdo').off().on('click', tioToTdoMigrate);
					tioToTdoButton.src=deleteBut.src;
					tioToTdoButton.alt=bp_told_translate.tioDelete;
					tioToTdoButton.title=bp_told_translate.tioDelete;
					tioToTdoButton.style.visibility ='visible';
					tioCompButton.style.visibility = 'visible';
					tioCompButton.alt=bp_told_translate.tioDisCompare;
					tioCompButton.title=bp_told_translate.tioDisCompare;
					tioCompButton.classList.remove('tio-comp');
					tioCompButton.classList.add('tio-dis-comp');
					$('.tio-dis-comp').off().on('click', tioDisCompare);
					$('.tio-comp').off().on('click',tioCompare);
				}
				tioButton.style.visibility ='visible';
				tdoButton.src=restoreBut.src;
				tdoButton.alt=bp_told_translate.tdoRestoreOverload;
				tdoButton.title=bp_told_translate.tdoRestoreOverload;
				tdoButton.classList.remove('tdo-disable');
				$('.tdo-disable').off().on('click', tdoDisable);
				tdoButton.classList.remove('tdo-enable');
				$('.tdo-enable').off().on('click', tdoEnable);
				tdoButton.classList.add('tdo-restore');
				$('.tdo-restore').off().on('click', tdoRestore);
				tdoToTioButton.src=deleteBut.src;
				tdoToTioButton.alt=bp_told_translate.tdoDelete;
				tdoToTioButton.title=bp_told_translate.tdoDelete;
				tdoToTioButton.classList.remove('tdo-to-tio');
				$('.tdo-to-tio').off().on('click', tdoToTioMigrate);
				tdoToTioButton.classList.add('tdo-delete');
				$('.tdo-delete').off().on('click', tdoDelete);
				tdoCompButton.style.visibility = 'visible';
				tdoCompButton.alt=bp_told_translate.tdoDisCompare;
				tdoCompButton.title=bp_told_translate.tdoDisCompare;
				tdoCompButton.classList.remove('tdo-comp');
				tdoCompButton.classList.add('tdo-dis-comp');
				$('.tdo-dis-comp').off().on('click', tdoDisCompare);
				$('.tdo-comp').off().on('click',tdoCompare);
				olStatus.innerHTML = bp_told_translate.notOverloaded;
				olFilepath.innerHTML = bp_told_translate.tdoDisabled + data[1];
				},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tdo-disable').off().on('click', tdoDisable);

	function tdoDelete(e){

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var path = e.target.name;
		var tdoButton = document.getElementById(path + '-tdoButton');
		var tdoToTioButton = document.getElementById(path + '-tdoToTio');
		var tioToTdoButton = document.getElementById(path + '-tioToTdo');
		var tdoCompButton = document.getElementById(path + '-tdoCompButton');
		var olStatus = document.getElementById(path + "-Status");
		var olFilepath = document.getElementById(path + "-filePath");
		var tioButton = document.getElementById(path + '-tioButton');
		tdoToTioButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tdo_delete"
			},
			success : function(data) {
				if ( tioToTdoButton.style.visibility == "hidden" ) {
					tioButton.src=tioEnableBut.src;
					tioButton.alt=bp_told_translate.tioEnableOverload;
					tioButton.title=bp_told_translate.tioEnableOverload;
					tioButton.classList.remove('tio-restore');
					tioButton.classList.remove('tio-disable');
					tioButton.classList.add('tio-enable');
					$('.tio-enable').off().on('click', tioEnable);
					$('.tio-disable').off().on('click', tioDisable);
					$('.tio-restore').off().on('click', tioRestore);
				}	
				if ( tioToTdoButton.style.visibility == "visible" ) {
					tioButton.src=restoreBut.src;
					tioToTdoButton.src=deleteBut.src;
					tioButton.alt=bp_told_translate.tioRestore;
					tioButton.title=bp_told_translate.tioRestore;
					tioButton.classList.add('tio-restore');
					tioButton.classList.remove('tio-disable');
					tioButton.classList.remove('tio-enable');
					$('.tio-enable').off().on('click', tioEnable);
					$('.tio-disable').off().on('click', tioDisable);
					$('.tio-restore').off().on('click', tioRestore);
					}	
				tioButton.style.visibility ='visible';
				tdoCompButton.style.visibility = 'hidden';
				tdoButton.src=tdoEnableBut.src;
				tdoButton.alt=bp_told_translate.tdoEnableOverload;
				tdoButton.title=bp_told_translate.tdoEnableOverload;
				tdoButton.classList.remove('tdo-restore');
				$('.tdo-restore').off().on('click', tdoRestore);
				tdoButton.classList.remove('tdo-disable');
				$('.tdo-disable').off().on('click', tdoDisable);
				tdoButton.classList.add('tdo-enable');
				$('.tdo-enable').off().on('click', tdoEnable);
				tdoToTioButton.style.visibility ='hidden';
				tdoToTioButton.src=disableBut.src;
				tdoToTioButton.alt=bp_told_translate.tdoToTioMigrate;
				tdoToTioButton.title=bp_told_translate.tdoToTioMigrate;
				tdoToTioButton.classList.toggle('tdo-delete');
				$('.tdo-delete').off().on('click', tdoDelete);
				tdoToTioButton.classList.toggle('tdo-to-tio');
				$('.tdo-to-tio').off().on('click', tdoToTioMigrate);
				olStatus.innerHTML = bp_told_translate.notOverloaded;
				olFilepath.innerHTML = bp_told_translate.tdoDeleted;
				},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tdo-delete').off().on('click', tdoDelete);

	function tdoRestore(e){

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var tdoButton = document.getElementById(e.target.name + '-tdoButton');
		var path = tdoButton.name;		
		var tdoToTioButton = document.getElementById(path + '-tdoToTio');
		var tioToTdoButton = document.getElementById(path + '-tioToTdo');
		var tdoCompButton = document.getElementById(path + '-tdoCompButton');
		var olStatus = document.getElementById(path + "-Status");
		var olFilepath = document.getElementById(path + "-filePath");
		var tioButton = document.getElementById(path + '-tioButton');
		tdoButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tdo_restore"
			},
			success : function(data) {
				tioButton.style.visibility ='hidden';
				tioButton.src=tioEnableBut.src;
				tdoButton.src=disableBut.src;
				tdoButton.alt=bp_told_translate.tdoDisableOverload;
				tdoButton.title=bp_told_translate.tdoDisableOverload;
				tdoButton.classList.remove('tdo-restore');
				$('.tdo-restore').off().on('click', tdoRestore);
				tdoButton.classList.remove('tdo-enable');
				$('.tdo-enablee').off().on('click', tdoEnable);
				tdoButton.classList.add('tdo-disable');
				$('.tdo-disable').off().on('click', tdoDisable);
				tdoToTioButton.style.visibility ='visible';
				tdoToTioButton.src=migrateBut.src;
				tdoToTioButton.alt=bp_told_translate.tdoToTioMigrate;
				tdoToTioButton.title=bp_told_translate.tdoToTioMigrate;
				tdoToTioButton.classList.remove('tdo-delete');
				$('.tdo-delete').off().on('click', tdoDelete);
				tdoToTioButton.classList.add('tdo-to-tio');
				$('.tdo-to-tio').off().on('click', tdoToTioMigrate);
				tdoCompButton.style.visibility = 'visible';
				tdoCompButton.alt=bp_told_translate.tdoCompare;
				tdoCompButton.title=bp_told_translate.tdoCompare;
				tdoCompButton.classList.add('tdo-comp');
				tdoCompButton.classList.remove('tdo-dis-comp');
				$('.tdo-dis-comp').off().on('click', tdoDisCompare);
				$('.tdo-comp').off().on('click',tdoCompare);
				olStatus.innerHTML = bp_told_translate.tioThemeOverload;
				olFilepath.innerHTML = bp_told_translate.restoreTdo + data + bp_told_translate.completed;
				},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tdo-restore').off().on('click', tdoRestore);

	function tdoToTioMigrate(e){

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var path = e.target.name;
		var tdoButton = document.getElementById(path + '-tdoButton');
		var olStatus = document.getElementById(path + "-Status");
		var olFilepath = document.getElementById(path + "-filePath");
		var tdoToTioButton = document.getElementById(path + '-tdoToTio');
		var tdoCompButton = document.getElementById(path + '-tdoCompButton');
		var tioCompButton = document.getElementById(path + '-tioCompButton');
		var tdoCompButton = document.getElementById(path + '-tdoCompButton');
		var tioButton = document.getElementById(path + '-tioButton');
		var tioToTdoButton = document.getElementById(path + '-tioToTdo');
		tdoToTioButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tdo_to_tio"
			},
			success : function(data) {
				tdoButton.style.visibility='hidden';
				tdoCompButton.style.visibility = 'hidden';
				tdoToTioButton.style.visibility = 'hidden';
				tioToTdoButton.src=migrateBut.src;
				tioToTdoButton.alt=bp_told_translate.tdoToTioMigrate;
				tioToTdoButton.title=bp_told_translate.tdotoTioMigrate;
				tioToTdoButton.classList.add('tio-to-tdo');
				tioToTdoButton.classList.remove('tio-delete');
				$('.tio-to-tdo').off().on('click', tioToTdoMigrate);
				$('.tio-delete').off().on('click',tioDelete);
				tioButton.classList.remove('tio-enable');
				tioButton.classList.remove('tio-restore');
				tioButton.classList.add('tio-disable');
				$('.tio-disable').off().on('click',tioDisable);
				$('.tio-restore').off().on('click',tioRestore);
				$('.tio-enable').off().on('click',tioEnable);
				tioButton.src=disableBut.src;
				tioButton.alt=bp_told_translate.tioDisable;
				tioButton.title=bp_told_translate.tioDisable;
				tdoCompButton.style.visibility = 'hidden';
				tioCompButton.style.visibility = 'visible';
				tioCompButton.alt=bp_told_translate.tioCompare;
				tioCompButton.title=bp_told_translate.tioCompare;
				tioCompButton.classList.add('tio-comp');
				tioCompButton.classList.remove('tio-dis-comp');
				$('.tio-dis-comp').off().on('click', tioDisCompare);
				$('.tio-comp').off().on('click',tioCompare);
				olStatus.innerHTML = bp_told_translate.tioThemeOverload;
				olFilepath.innerHTML = bp_told_translate.migrateToTio + data + bp_told_translate.completed;
				tioButton.style.visibility='visible';
				tioToTdoButton.style.visibility='visible';
			},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tdo-to-tio').off().on('click', tdoToTioMigrate);
	
	function tioCompare(e){
		var toldNonce = document.getElementById( 'told-nonce' ).value;
		e.preventDefault();
		var path = e.target.name;
		var olFilepath = document.getElementById(path + "-filePath");
		var filePath = olFilepath.innerText;
		var tioCompButton = document.getElementById(path + '-tioCompButton');
		tioCompButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tio_compare"
			},
			success : function(data) {
				$.fancybox.open('<div class="message"><span style="width: 50%;"><strong>' + bp_told_translate.originalFile +
					'</strong></span><span style="width: 50%; float: right;"><strong>' + bp_told_translate.overloadFile + ' | '
					+ filePath + '</strong></span>' + data + '</div>');
				tioCompButton.src=compareBut.src;
			},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tio-comp').off().on('click', tioCompare);	
	
	function tdoCompare(e){
		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var path = e.target.name;
		var olFilepath = document.getElementById(path + "-filePath");
		var tdoCompButton = document.getElementById(path + '-tdoCompButton');
		var filePath = olFilepath.innerText;
		tdoCompButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tdo_compare"
			},
			success : function(data) {
				$.fancybox.open('<div class="message"><span style="width: 50%;"><strong>' + bp_told_translate.originalFile + 
					'</strong></span><span style="width: 50%; float: right;"><strong>' + bp_told_translate.overloadFile + ' | '
					+ filePath + '</strong></span>' + data + '</div>');
				tdoCompButton.src=compareBut.src;
			},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tdo-comp').off().on('click', tdoCompare);

	function tioDisCompare(e){
		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var path = e.target.name;
		var olFilepath = document.getElementById(path + "-filePath");
		var filePath = olFilepath.innerText;
		var tioCompButton = document.getElementById(path + '-tioCompButton');
		tioCompButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tio_dis_compare"
			},
			success : function(data) {
				data=JSON.parse(data);
				$.fancybox.open('<div class="message"><span style="width: 50%;"><strong>' + bp_told_translate.originalFile +
					'</strong></span><span style="width: 50%; float: right;"><strong>' + bp_told_translate.overloadFile + ' | '
					+ data[0] + '</strong></span>' + data[1] + '</div>');
				tioCompButton.src=compareBut.src;
			},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tio-dis-comp').off().on('click', tioDisCompare);	
	
	function tdoDisCompare(e){
		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var path = e.target.name;
		var olFilepath = document.getElementById(path + "-filePath");
		var tdoCompButton = document.getElementById(path + '-tdoCompButton');
		var filePath = olFilepath.innerText;
		tdoCompButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tdo_dis_compare"
			},
			success : function(data) {
				data=JSON.parse(data);
				$.fancybox.open('<div class="message"><span style="width: 50%;"><strong>' + bp_told_translate.originalFile + 
					'</strong></span><span style="width: 50%; float: right;"><strong>' + bp_told_translate.overloadFile + ' | '
					+ data[0] + '</strong></span>' + data[1] + '</div>');
				tdoCompButton.src=compareBut.src;
			},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tdo-dis-comp').off().on('click', tdoDisCompare);

	function tnoView(e){
		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var path = e.target.name;
		var tnoViewButton = document.getElementById(path + '-tnoViewButton');;
		tnoViewButton.src = loadingBut.src;

		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tno_view"
			},
			success : function(data) {
				data=JSON.parse(data);
				$.fancybox.open('<div class="message"><span style="width: 100%;"><strong>' + bp_told_translate.bpTemplateOriginal + data[0] + '</strong></span><p>'+ data[1] + '</p></div>');
			tnoViewButton.src = viewBut.src;
			},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tno-view').off().on('click', tnoView);

	function switchTab(e) {

		var toldNonce = document.getElementById( 'told-nonce' ).value;
		e.preventDefault();
		var templateTab = document.getElementById('tab-1');
		var usingTab = document.getElementById('tab-2');
		var templateLi = document.getElementById('template-li');
		var usingLi = document.getElementById('using-li');
		
		templateLi.classList.toggle('active');
		usingLi.classList.toggle('active');
		templateTab.classList.toggle('active');
		usingTab.classList.toggle('active');

	}
	
	$('ul.nav-tabs > li').off().on('click', switchTab);
	
	function tnoNouCompare(e){
		var toldNonce = document.getElementById( 'told-nonce' ).value;
		var path = e.target.name;
		var olFilepath = document.getElementById(path + "-filePath");
		var tnoNouCompButton = document.getElementById(path + '-tnoNouCompButton');
		var filePath = olFilepath.innerText;
		tnoNouCompButton.src=loadingBut.src;
		
		$.ajax({
			url : ajax_object.ajaxurl,
			type : 'post',
			data : {
				path : path,
				security : toldNonce,
				action : "bp_told_tno_nou_compare"
			},
			success : function(data) {
				data=JSON.parse(data);
				$.fancybox.open('<div class="message"><span style="width: 50%;"><strong>' + bp_told_translate.bpTemplateOriginal + ' | ' + filePath +
					'</strong></span><span style="width: 50%; float: right;"><strong>' + bp_told_translate.bpTemplateNouveau + ' | '
					+ data[0] + '</strong></span>' + data[1] + '</div>');
				tnoNouCompButton.src=nouCompareBut.src;
			},
			error : function(data){
				console.log(data);
				console.log('failed');
			}
		});
	}

	$('.tno-nou-comp').off().on('click', tnoNouCompare);	
});