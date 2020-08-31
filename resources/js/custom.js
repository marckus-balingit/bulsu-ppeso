window.deleteFunction = function (module,route,name)
{
  Swal.fire({
    title: 'Are you sure?',
    html: `Are you sure you want to delete this ${module} <b>${name}</b>`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#dbd5d5',
    confirmButtonText: 'Confirm'
  }).then((result) => {
    if (result.value) {
      $(`#frm-${module}-delete`).attr('action',route).submit();
    }
  })
}