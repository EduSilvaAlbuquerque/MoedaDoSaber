document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formPlanoAula");
  const params = new URLSearchParams(window.location.search);
  const planoId = params.get("id");

  const campoTitulo = document.getElementById("titulo");
  const campoObjetivo = document.getElementById("objetivo");
  const campoConteudos = document.getElementById("conteudos");
  const campoMetodologia = document.getElementById("metodologia");
  const campoRecursos = document.getElementById("recursos");
  const campoCriterios = document.getElementById("criterios");
  const campoInicio = document.getElementById("data-inicio");
  const campoFim = document.getElementById("data-fim");
  const msgErro = document.querySelector(".erro-de-texto");

  async function carregarPlano() {
    try {
      const resp = await fetch(`http://localhost:81/v1/plano-aula/${planoId}`);
      if (!resp.ok) throw new Error("Não foi possível carregar");
      const plano = await resp.json();
      const dados = plano.data;

      campoTitulo.value = dados.titulo;
      campoObjetivo.value = dados.objetivo;
      campoConteudos.value = dados.conteudos ?? ""; 
      campoMetodologia.value = dados.metodologia;
      campoRecursos.value = dados.recursos_necessarios;
      campoCriterios.value = dados.criterios_avaliacao;
      campoInicio.value = dados.inicio_cronograma;
      campoFim.value = dados.fim_cronograma;
    } catch (e) {
      console.error(e);
      msgErro.textContent = "Erro ao carregar os dados do plano.";
      msgErro.style.display = "block";
    }
  }

  function validarCampos() {
    const campos = [
      campoTitulo,
      campoObjetivo,
      campoConteudos,
      campoMetodologia,
      campoRecursos,
      campoCriterios,
      campoInicio,
      campoFim,
    ];
    const todosPreenchidos = campos.every((c) => c.value.trim() !== "");
    if (!todosPreenchidos) {
      msgErro.textContent = "Todos os campos devem ser preenchidos!";
      msgErro.style.display = "block";
    } else {
      msgErro.style.display = "none";
    }
    return todosPreenchidos;
  }

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    if (!validarCampos()) return;

    const payload = {
      titulo: campoTitulo.value.trim(),
      objetivo: campoObjetivo.value.trim(),
      conteudos: campoConteudos.value.trim(),
      metodologia: campoMetodologia.value.trim(),
      recursos_necessarios: campoRecursos.value.trim(),
      criterios_avaliacao: campoCriterios.value.trim(),
      inicio_cronograma: campoInicio.value,
      fim_cronograma: campoFim.value,
    };

    try {
      const resp = await fetch(`http://localhost:81/v1/plano-aula/${planoId}`, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload),
      });
      if (!resp.ok) throw new Error("Falha ao atualizar");
      alert("Plano atualizado com sucesso!");
      window.location.href = "/GerenciarAulas/gerenciar_aulas.html";
    } catch (err) {
      console.error(err);
      msgErro.textContent = "Erro ao salvar. Tente novamente.";
      msgErro.style.display = "block";
    }
  });

  carregarPlano();
});
