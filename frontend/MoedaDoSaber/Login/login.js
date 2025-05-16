import { AuthService } from "./AuthService.js";

const authService = new AuthService("http://localhost:81/v1");

document
  .getElementById("login-form")
  .addEventListener("submit", async function (event) {
    event.preventDefault();

    const email = document.querySelector('input[name="E-mail"]').value;
    const senha = document.querySelector('input[name="Senha"]').value;

    try {
      const response = await authService.login(email, senha);

      if (response.data && response.data.id_professor) {
        localStorage.setItem("id_professor", response.data.id_professor);
      } else {
        throw new Error("ID do professor não encontrado na resposta.");
      }

      window.location.href = "../GerenciarAulas/gerenciar_aulas.html";
    } catch (error) {
      alert(error.message);
      console.error(error);
    }
  });
