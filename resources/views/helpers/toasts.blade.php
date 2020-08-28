<script type="text/javascript">
  $(function() {

    @if (session()->has('error'))
      let error = `{{ session()->get('error') }}`;
      Swal.fire({
        position: 'top-end',
        width: 400,
        icon: 'error',
        background: '#DC3545',
        title: `<small style='color:white;'>${error}</small>`,
        showConfirmButton: false,
        timer: 4000,
        toast: true,
      });
    @endif

    @if (session()->has('success'))
      let success = `{{ session()->get('success') }}`
      Swal.fire({
        position: 'top-end',
        width: 400,
        icon: 'success',
        background: '#28A745',
        title: `<small style='color:white;'>${success}</small>`,
        customClass: ['swal-height, swal2-popout'],
        showConfirmButton: false,
        timer: 4000,
        toast: true,
      });
    @endif

    @if (!empty($errors) && $errors->count() > 0)
        @foreach ($errors->all() as $error)
          let error = `{{ $error }}`
          Swal.fire({
            position: 'top-end',
            width: 400,
            icon: 'error',
            background: '#DC3545',
            title: `<small style='color:white;'>${error}</small>`,
            showConfirmButton: false,
            timer: 4000,
            toast: true,
          });
        @endforeach
    @endif

    @if (session()->has('status'))
      let status = `{{ session()->get('status') }}`
      Swal.fire({
        position: 'top-end',
        width: 400,
        icon: 'success',
        background: '#28A745',
        title: `<small style='color:white;'>${status}</small>`,
        customClass: ['swal-height, swal2-popout'],
        showConfirmButton: false,
        timer: 4000,
        toast: true,
      });
    @endif
  });
</script>