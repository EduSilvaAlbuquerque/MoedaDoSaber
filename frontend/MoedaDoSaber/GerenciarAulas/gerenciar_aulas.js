document.addEventListener("DOMContentLoaded", () => {
  const plansGrid = document.querySelector(".plans-grid");

  async function carregarPlanos() {
    try {
      const response = await fetch("http://localhost:81/v1/plano-aula");
      if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
      const { data: planos } = await response.json();

      plansGrid.innerHTML = "";

      planos.forEach(plano => {
        const planDiv = document.createElement("div");
        planDiv.className = "plan-item";
        planDiv.innerHTML = `
          <p><strong>Plano de Aula:</strong> ${plano.titulo}</p>
          <p><strong>Início:</strong> ${plano.inicio_cronograma}</p>
          <p><strong>Fim:</strong> ${plano.fim_cronograma}</p>
          <div class="plan-actions">
            <button class="edit-btn" data-id="${plano.id}"><img src="../Imagens/Editar.png" alt="Editar"></button>
            <button class="delete-btn" data-id="${plano.id}"><img src="../Imagens/Lixeira.png" alt="Excluir"></button>
          </div>
        `;
        plansGrid.appendChild(planDiv);
      });

      adicionarEventos();
    } catch (error) {
      console.error("Erro ao carregar planos:", error);
      plansGrid.innerHTML = '<p class="error">Falha ao carregar planos de aula.</p>';
    }
  }

  function adicionarEventos() {
    document.querySelectorAll(".delete-btn").forEach(button => {
      button.addEventListener("click", async () => {
        const id = button.dataset.id;
        if (confirm("Tem certeza que deseja apagar este plano de aula?")) {
          try {
            const resp = await fetch(`http://localhost:81/v1/plano-aula/${id}`, { method: 'DELETE' });
            if (resp.ok) {
              alert("Plano de aula apagado com sucesso!");
              carregarPlanos();
            } else alert("Erro ao apagar o plano de aula.");
          } catch (err) {
            console.error("Erro ao deletar:", err);
            alert("Erro ao apagar o plano de aula.");
          }
        }
      });
    });

    document.querySelectorAll(".edit-btn").forEach(button => {
      button.addEventListener("click", () => {
        window.location.href = `../Plano/EditarPlano/editar_plano.html?id=${button.dataset.id}`;
      });
    });
  }

  carregarPlanos();
});

