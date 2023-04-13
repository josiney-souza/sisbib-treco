SELECT DISTINCT
	l1.autor as Autor,
	l1.titulo as Título,
	cc1.cc as "Componente Curricular",
	cc1.semestre as Semestre
FROM Usos as u1, Livros as l1, Tipos as t1, "Componentes Curriculares" as cc1,
	Usos as u2, Livros as l2, Tipos as t2, "Componentes Curriculares" as cc2
WHERE (u1.livro = l1.id AND u1.tipo = t1.id AND u1.cc = cc1.id)
	AND (u2.livro = l2.id AND u2.tipo = t2.id AND u2.cc = cc2.id)
	AND (l1.autor = l2.autor AND l1.titulo = l2.titulo AND l1.subtitulo = l2.subtitulo AND cc1.cc <> cc2.cc)
ORDER by l1.titulo, l1.autor