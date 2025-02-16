function confirmarBorrado(id) {
    if (confirm('¿Está seguro de que desea borrar este usuario?')) {
        window.location.href = `borrar_usuario.php?id=${id}`;
    }
}

// Validación de formularios
document.addEventListener('DOMContentLoaded', function() {
    const userForm = document.querySelector('.user-form');
    if (userForm) {
        userForm.addEventListener('submit', function(e) {
            const password = document.querySelector('input[name="password"]').value;
            const edad = document.querySelector('input[name="edad"]').value;

            if (password.length < 6) {
                e.preventDefault();
                alert('La contraseña debe tener al menos 6 caracteres');
                return;
            }

            if (edad < 18 || edad > 100) {
                e.preventDefault();
                alert('La edad debe estar entre 18 y 100 años');
                return;
            }
        });
    }
});