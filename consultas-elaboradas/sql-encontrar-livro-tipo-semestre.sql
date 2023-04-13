SELECT
	l.autor as Autor,
	l.titulo as Título,
	t.tipo as Tipo,
	cc.cc as "Componente Curricular",
	cc.semestre as Semestre
FROM Usos as u, Livros as l, Tipos as t, "Componentes Curriculares" as cc
WHERE u.livro = l.id AND u.tipo = t.id AND u.cc = cc.id
ORDER by l.titulo