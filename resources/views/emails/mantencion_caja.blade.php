<!DOCTYPE html>
<html>

<head>

	<title></title>

</head>

<body>

	Se ha realizado una mantención a: {{ $mantencion->equipo->nombre }}.

	<br/>

	Código: {{ $mantencion->codigo }}

	<br/>

	Detalle: {{ $mantencion->detalle }}

	<br/><br/>

	<a href="http://it.sanchez.local/sysventario/public/mantenciones">Ver listado</a>

</body>

</html>