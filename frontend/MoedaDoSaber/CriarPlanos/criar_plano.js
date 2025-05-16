document.getElementById("formPlanoAula").addEventListener("submit", async function (e) {
  e.preventDefault();

  const errorText = document.querySelector(".erro-de-texto");

  // Lista dos IDs dos campos que precisam ser validados
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

  let formularioValido = true;

  // Validação dos campos
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
    return;
  } else {
    errorText.style.display = "none";
  }

  // Monta o objeto para envio
  const plano = {
    id_professor: 8, // Substitua conforme sua lógica de autenticação
    titulo: document.getElementById("titulo").value.trim(),
    objetivo: document.getElementById("objetivo").value.trim(),
    metodologia: document.getElementById("metodologia").value.trim(),
    recursos_necessarios: document.getElementById("recursos").value.trim(),
    criterios_avaliacao: document.getElementById("criterios").value.trim(),
    inicio_cronograma: document.getElementById("data-inicio").value,
    fim_cronograma: document.getElementById("data-fim").value,
  };

  try {
    const response = await fetch("http://localhost/v1/plano-aula", {
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
