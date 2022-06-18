function capitalize_Words(str)
{
return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function loading()
{
    $('#loader').show();
    $('.div-loading').addClass('background-load');
}
function matikanLoading()
{
    $('#loader').hide();
    $('.div-loading').removeClass('background-load');
}

function formatAngka(angka)
{
	 var reverse = angka.toString().split('').reverse().join(''),
	 ribuan = reverse.match(/\d{1,3}/g);
	 ribuan = ribuan.join('.').split('').reverse().join('');
	return ribuan;
}

function hapusvalidasi(key,edit=false) 
{
    let pesan = edit === true ? $('#edit_'+key) :$('#'+key);
    let text = edit === true ? $('.edit_'+key) :$('.'+key);
    pesan.removeClass('is-invalid');
    text.text(null);
}

function tambahvalidasi(key,edit = false,value) 
{
    let pesan = edit === true ? $('#edit_'+key) :$('#'+key);
    let text = edit === true ? $('.edit_'+key) :$('.'+key);
    pesan.addClass('is-invalid');
    text.text(value);
}