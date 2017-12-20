var ajaxFormCallback = [];
ajaxFormCallback['reload'] = function() {
	location.reload();
}
ajaxFormCallback['go'] = function(data) {
	document.location.href = data.url;
}
ajaxFormCallback['notify'] = function(data) {
  var type = data.error == 0 ? 'success' : 'danger';

  if( data.type )
	type = data.type;

	$.notify({
		icon: data.icon,
		title: data.title,
		message: data.message ? data.message : ''
	},{
		type: type,
		placement: {
			from: "bottom",
			align: "right"
		},
	});
}

ajaxFormCallback['pet-publish'] = function(data) {
  redirect(App.config.url+'pets', function() {
  	$.notify({
			icon: 'fa fa-thumb-tack',
			title: '¡Mascota publicada!',
			message: '¡Gracias por ayudar a mejorar una vida! Al hacerla pública, ya es compromiso de todos!'
		},{
			type: 'success',
		placement: {
			from: "bottom",
			align: "right"
		},
		});
  });
}

ajaxFormCallback['pet-edit'] = function(data) {
	$.notify({
		icon: 'fa fa-pencil',
		title: '¡Mascota actualizada!',
		message: '¡Gracias por ayudar a mejorar una vida! Al hacerla pública, ya es compromiso de todos!'
	},{
		type: 'success',
		placement: {
		from: "bottom",
		align: "right"
		},
	});
}