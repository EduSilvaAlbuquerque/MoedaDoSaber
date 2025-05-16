import { AuthService } from './AuthService.js';

const authService = new AuthService('http://localhost:81/v1');

document.getElementById('login-form').addEventListener('submit', async function (event) {
  event.preventDefault();

  const email = document.querySelector('input[name="E-mail"]').value;
  const senha = document.querySelector('input[name="Senha"]').value;

  try {
    const user = await authService.login(email, senha);

    
    window.location.href = '../GerenciarAulas/gerenciar_aulas.html';
  } catch (error) {
    alert(error.message);
    console.error(error);
  }
});
