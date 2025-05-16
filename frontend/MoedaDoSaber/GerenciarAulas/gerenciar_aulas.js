document.addEventListener("DOMContentLoaded", () => {
  const plansGrid = document.querySelector(".plans-grid");

  async function carregarPlanos() {
    try {
      const resposta = await fetch("http://localhost/v1/plano-aula");
      const planos = await resposta.json();

      plansGrid.innerHTML = "";

      planos.data.forEach((plano) => {
        const planDiv = document.createElement("div");
        planDiv.className = "plan-item";
        planDiv.innerHTML = `
          <p><strong>Plano de Aula:</strong> ${plano.titulo}</p>
          <p><strong>Professor:</strong> ${
            plano.professor?.nome ?? "Desconhecido"
          }</p>
          <div class="plan-actions">
              <button class="edit-btn" data-id="${
                plano.id
              }"><img src="../Imagens/Editar.png" alt="Editar"></button>
              <button class="delete-btn" data-id="${
                plano.id
              }"><img src="../Imagens/Lixeira.png" alt="Excluir"></button>
          </div>
        `;
        plansGrid.appendChild(planDiv);
      });

      adicionarEventos();
    } catch (error) {
      console.error("Erro ao carregar planos:", error);
    }
  }

  function adicionarEventos() {
    document.querySelectorAll(".delete-btn").forEach((button) => {
      button.addEventListener("click", async (e) => {
        const id = button.getAttribute("data-id");
        if (confirm("Tem certeza que deseja apagar este plano de aula?")) {
          try {
            const resposta = await fetch(
              `http://localhost/v1/plano-aula/${id}`,
              {
                method: "DELETE",
              }
            );

            if (resposta.ok) {
              alert("Plano de aula apagado com sucesso!");
              carregarPlanos();
            } else {
              alert("Erro ao apagar o plano de aula.");
            }
          } catch (error) {
            console.error("Erro ao deletar:", error);
          }
        }
      });
    });

    document.querySelectorAll(".edit-btn").forEach((button) => {
      button.addEventListener("click", () => {
        const id = button.getAttribute("data-id");
        window.location.href = `../EditarPlanos/editar_plano.html?id=${id}`;
      });
    });
  }

  carregarPlanos();
});
