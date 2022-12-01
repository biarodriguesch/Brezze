function preencherModal(object) {
    document.getElementById('id_produto').innerHTML = object.id
    document.getElementById('produto').innerHTML = object.produto
}

function deleteTabela(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: " text-white bg-green-700 hover:bg-green-800  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800",
            cancelButton: " text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            axios.get('/deletarProduto/' + id)
                .then(function (response) {
                    if(response.status == 200){
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success')
                    }

                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                })
                .catch(function (error) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'A error a aconteceu',
                        'error'
                    )
                });

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
}
