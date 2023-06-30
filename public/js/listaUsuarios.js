// Obtener la referencia a los elementos del DOM
    const userList = document.getElementById('users');
    const userForm = document.getElementById('user-form-data');
    const userId = document.getElementById('user-id');

    const userIdInput = document.getElementById('user-id');
    const userNameInput = document.getElementById('userName');
    const passwordInput = document.getElementById('password');
    const firtNameInput = document.getElementById('firtName');
    const userLastNameInput = document.getElementById('userLastName');
    const userEmailInput = document.getElementById('userEmail');
document.addEventListener('DOMContentLoaded', function() {

    // Cargar la lista de usuarios al cargar la página
    loadUsers();
  
    // Manejar el envío del formulario
    userForm.addEventListener('submit', function(event) {
      event.preventDefault();
      const id = userIdInput.value;
      const userName = userNameInput.value;
      const password = passwordInput.value;
      const firtName = firtNameInput.value;
      const userLastName = userLastNameInput.value;
      const userEmail = userEmailInput.value;
  
      if (id) {
        // Editar usuario existente
        editUser(id, firtName, userLastName, userEmail);
      } else {
        // Crear nuevo usuario
        createUser(userName, password, firtName, userLastName, userEmail);
      }
  
      // Limpiar el formulario
      userForm.reset();
      userId.value = '';
    });

  
    // Crear un nuevo usuario en la base de datos
    function createUser(userName, password, firtName, userLastName, userEmail) {
      const data = { userName: userName, password: password, firtName: firtName, userLastName: userLastName, userEmail: userEmail };
      fetch('/wLogin/src/Controller/UserController.php?action=createUser', {
        method: 'POST',
        body: JSON.stringify(data)
      })
        .then(response => response.json())
        .then(() => {
          loadUsers();
        });
    }
  
    // Editar un usuario existente en la base de datos
    function editUser(id, firtName, userLastName, userEmail) {
      const data = { id: id, firtName: firtName, userLastName: userLastName, userEmail: userEmail };
      fetch('/wLogin/src/Controller/UserController.php?action=editUser', {
        method: 'POST',
        body: JSON.stringify(data)
      })
        .then(response => response.json())
        .then(() => {
          loadUsers();
        });
    }
  });
  // Cargar la lista de usuarios desde la base de datos
  function loadUsers() {
    fetch('/wLogin/src/Controller/UserController.php?action=getUsers')
      .then(response => response.json())
      .then(data => {
        userList.innerHTML = '';
        data.forEach(user => {
          const listItem = document.createElement('li');
          listItem.innerHTML = `
            <strong>${user.username}</strong>
            <button class="button warning" onclick="editForm(${user.id}, '${user.username}','${user.nombre}', '${user.apellido}', '${user.correo}', 'not editable')">Editar</button>
            <button class="button danger" onclick="deleteUser(${user.id})">Eliminar</button>
          `;
          userList.appendChild(listItem);
        });
      });
  }
    // Eliminar un usuario de la base de datos
    function deleteUser(id) {
    if (confirm('¿Estás seguro de eliminar este usuario?')) {
        fetch(`/wLogin/src/Controller/UserController.php?action=deleteUser&id=${id}`, {
        method: 'DELETE'
        })
        .then(response => response.json())
        .then(() => {
            loadUsers();
        });
    }
    }

    // Llenar el formulario de edición con los datos del usuario seleccionado
    function editForm(id, userName, firtName, userLastName, userEmail, password) {
        
    const userIdInput = document.getElementById('user-id');
    const userNameInput = document.getElementById('userName');
    const passwordInput = document.getElementById('password');
    const firtNameInput = document.getElementById('firtName');
    const userLastNameInput = document.getElementById('userLastName');
    const userEmailInput = document.getElementById('userEmail');

        userIdInput.value= id;
        userNameInput.value= userName + ' (not editable)';
        passwordInput.value= password;
        firtNameInput.value= firtName;
        userLastNameInput.value= userLastName;
        userEmailInput.value= userEmail;
    }
    document.getElementById("cancelButton").addEventListener("click", cancelButtonClicked);

        function cancelButtonClicked() {
            userIdInput.value= "";
            userNameInput.value= "";
            passwordInput.value= "";
            firtNameInput.value= "";
            userLastNameInput.value= "";
            userEmailInput.value= "";
        }