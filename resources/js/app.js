window.deleteProd = (id_prod, row)=>{
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {

        if (result.isConfirmed) {
            deleteProds(id_prod, row)
        //   Swal.fire({
        //     title: "Deleted!",
        //     text: "Your file has been deleted.",
        //     icon: "success"
        //   });
        }
      });
}

//eliminar productos accion
window.deleteProds = async (id_prod, row)=>{
    const url='products/'+id_prod;
    const csfrToken = document.querySelector('input[name="_token"]').value;
    await fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csfrToken
        }
    }).then(response=>response.json())
    .then(response=>{

        Swal.fire({
            position: "center",
            icon: response.icon,
            title: response.title,
            showConfirmButton: false,
            timer: 2000
          });

        //   $(row).closest('tr').remove();
        recargarPag();
    });
    
}

const recargarPag = ()=>{
    setTimeout(()=>{
        location.reload();
    },2500)

}

//crear productos
window.CreateProd = ()=>{

    //datos
    const prod_codigo = document.getElementById('prod_codigo').value;
    const prod_nombre = document.getElementById('prod_nombre').value;
    const prod_precio = document.getElementById('prod_precio').value;
    const prod_descripcion = document.getElementById('prod_descripcion').value;
    const prod_categoria = document.getElementById('prod_categoria').value;
    const csfrToken = document.querySelector('input[name="_token"]').value;

    //validacion
    if(prod_codigo.trim() == '' || prod_nombre.trim() == '' || prod_precio.trim() == '' || prod_categoria.trim() == '' || prod_descripcion.trim() == '' || csfrToken.trim() == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Complete todos los campos',
        })
    }else{
        const url = 'create';
        const data = {
            prod_codigo: prod_codigo,
            prod_nombre: prod_nombre,
            prod_precio: prod_precio,
            prod_descripcion: prod_descripcion,
            prod_categoria: prod_categoria,
            _token: csfrToken
        }

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csfrToken
            },
            body: JSON.stringify(data)
        }).then(response=>response.json())
     .then(response=>{
        Swal.fire({
            position: "center",
            icon: response.icon,
            title: response.title,
            showConfirmButton: false,
            timer: 2000
          });

          redirigirVistaProd();
      });
     
    }
}

const redirigirVistaProd = ()=>{
    setTimeout(()=>{
        location.href = '/laravel/public/products';
    },2500)
}

//editar prods
window.UpdateProd = ()=>{

    //datos
    const prod_uid = document.getElementById('prod_uid').value;
    const prod_codigo = document.getElementById('prod_codigo').value;
    const prod_nombre = document.getElementById('prod_nombre').value;
    const prod_precio = document.getElementById('prod_precio').value;
    const prod_descripcion = document.getElementById('prod_descripcion').value;
    const prod_categoria = document.getElementById('prod_categoria').value;
    const csfrToken = document.querySelector('input[name="_token"]').value;

    //validacion
    if(prod_uid.trim()=='' || prod_codigo.trim() == '' || prod_nombre.trim() == '' || prod_precio.trim() == '' || prod_categoria.trim() == '' || prod_descripcion.trim() == '' || csfrToken.trim() == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Complete todos los campos',
        })
    }else{
        const url = prod_uid;
        const data = {
            prod_codigo: prod_codigo,
            prod_nombre: prod_nombre,
            prod_precio: prod_precio,
            prod_descripcion: prod_descripcion,
            prod_categoria: prod_categoria,
            _token: csfrToken
        }
        

        fetch(url, {
            method: 'put',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csfrToken
            },
            body: JSON.stringify(data)
        }).then(response=>response.json())
     .then(response=>{
        Swal.fire({
            position: "center",
            icon: response.icon,
            title: response.title,
            showConfirmButton: false,
            timer: 2000
          });

          redirigirVistaProd();
      });

      
     
    }
}
