window.deleteProd = (id_prod, row,controller)=>{
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
            deleteProds(id_prod, row,controller)
        //   Swal.fire({
        //     title: "Deleted!",
        //     text: "Your file has been deleted.",
        //     icon: "success"
        //   });
        }
      });
}

//eliminar productos accion
window.deleteProds = async (id_prod, row , controller)=>{
    const url=controller+'/'+id_prod;
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

          redirigirVistaProd('/LARAVEL_CRUD/public/products');
      });
     
    }
}

const redirigirVistaProd = (url)=>{
    setTimeout(()=>{
        location.href = url;
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

          redirigirVistaProd('/LARAVEL_CRUD/public/products');
      });

      
     
    }
}

//crear productos
window.CreateUser = ()=>{

    //datos
    const name = document.getElementById('name').value;
    const last_name = document.getElementById('last_name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const role_id = document.getElementById('role_id').value;
    const csfrToken = document.querySelector('input[name="_token"]').value;

    console.log(name,last_name,email,password,role_id);

    //validacion
    if(name.trim() == '' || last_name.trim() == '' || email.trim() == '' || password.trim() == '' || role_id.trim() == '' || csfrToken.trim() == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Complete todos los campos',
        })
    }else{
        const url = 'create';
        const data = {
            name: name,
            last_name: last_name,
            email: email,
            password: password,
            role_id: role_id,
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

          redirigirVistaProd('/LARAVEL_CRUD/public/users');
      });
     
    }
}

//editar prods
window.updateUser = ()=>{

    //datos
    const user_uid = document.getElementById('user_uid').value;
    const name = document.getElementById('name').value;
    const last_name = document.getElementById('last_name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const role_id = document.getElementById('role_id').value;
    const csfrToken = document.querySelector('input[name="_token"]').value;

    //validacion
    if(user_uid.trim()=='' || name.trim() == '' || last_name.trim() == '' || email.trim() == '' || password.trim() == '' || role_id.trim() == '' || csfrToken.trim() == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Complete todos los campos',
        })
    }else{
        const url = user_uid;
        const data = {
            user_uid: user_uid,
            name: name,
            last_name: last_name,
            email: email,
            password: password,
            role_id: role_id,
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

          redirigirVistaProd('/LARAVEL_CRUD/public/users');
      });

      
     
    }
}