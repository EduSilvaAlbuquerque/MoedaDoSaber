document
  .getElementById("formPlanoAula")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const errorText = document.querySelector(".erro-de-texto");

    const campos = [
      "titulo",
      "objetivo",
      "conteudos",
      "metodologia",
      "recursos",
      "criterios",
      "data-inicio",
      "data-fim",
    ];

    const idProfessor = localStorage.getItem("id_professor");
    if (!idProfessor) {
      alert("Erro: usuário não autenticado ou ID do professor não encontrado.");
      return;
    }

    let formularioValido = true;

    campos.forEach((id) => {
      const campo = document.getElementById(id);
      if (!campo.value.trim()) {
        campo.classList.add("input-erro");
        formularioValido = false;
      } else {
        campo.classList.remove("input-erro");
      }
    });

    if (!formularioValido) {
      errorText.style.display = "block";
      errorText.textContent =
        "Por favor, preencha todos os campos obrigatórios.";
      return;
    } else {
      errorText.style.display = "none";
    }

    const plano = {
      id_professor: Number(idProfessor),
      titulo: document.getElementById("titulo").value.trim(),
      objetivo: document.getElementById("objetivo").value.trim(),
      conteudos: document.getElementById("conteudos").value.trim(),
      metodologia: document.getElementById("metodologia").value.trim(),
      recursos_necessarios: document.getElementById("recursos").value.trim(),
      criterios_avaliacao: document.getElementById("criterios").value.trim(),
      inicio_cronograma: document.getElementById("data-inicio").value,
      fim_cronograma: document.getElementById("data-fim").value,
    };

    try {
      const response = await fetch("http://localhost:81/v1/plano-aula", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(plano),
      });

      if (!response.ok) {
        const erro = await response.json().catch(() => ({}));
        throw new Error(erro.message || "Erro ao criar o plano.");
      }

      const resultado = await response.json().catch(() => ({}));
      alert(resultado.message || "Plano de aula criado com sucesso!");
      window.location.href = "../GerenciarAulas/gerenciar_aulas.html";
    } catch (erro) {
      alert("Erro ao enviar plano: " + erro.message);
    }
  });
