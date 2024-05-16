-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2024 a las 03:19:50
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_usuario` int(11) NOT NULL,
  `permiso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_usuario`, `permiso`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_usuario` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `puntuacion` decimal(4,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_multiple`
--

CREATE TABLE `evaluacion_multiple` (
  `id_usuario` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `respuesta_usuario` varchar(200) NOT NULL,
  `puntaje` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_verdadero_fal`
--

CREATE TABLE `evaluacion_verdadero_fal` (
  `id_usuario` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `respuesta_usuario` varchar(200) NOT NULL,
  `puntaje` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_opmultiple`
--

CREATE TABLE `pregunta_opmultiple` (
  `id_pregunta` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `pregunta` varchar(250) NOT NULL,
  `respuesta_correcta` varchar(200) NOT NULL,
  `respuesta_incorrecta1` varchar(200) NOT NULL,
  `respuesta_incorrecta2` varchar(200) NOT NULL,
  `respuesta_incorrecta3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta_opmultiple`
--

INSERT INTO `pregunta_opmultiple` (`id_pregunta`, `id_tema`, `pregunta`, `respuesta_correcta`, `respuesta_incorrecta1`, `respuesta_incorrecta2`, `respuesta_incorrecta3`) VALUES
(1, 1, '¿Cuál de los siguientes no es un paso típico en el proceso de la ciencia de datos?', 'Desprecio de datos', 'Recopilación de datos', 'Análisis de datos', 'Interpretación de resultados'),
(2, 1, '¿Qué técnica de visualización de datos es útil para identificar la distribución y la dispersión de un conjunto de datos?', 'Histogramas', 'Mapas de calor', 'Gráficos de barras', 'Diagramas de Venn'),
(3, 1, '¿Qué etapa del proceso de ciencia de datos implica la identificación de patrones y relaciones en los datos?', 'Análisis exploratorio de datos', 'Limpieza de datos', 'Interpretación de resultados', 'Modelado de datos'),
(4, 1, '¿Cuál de las siguientes no es una biblioteca de Python comúnmente utilizada en la ciencia de datos?', 'TensorFlow', 'Pandas', 'Seaborn', 'Matplotlib'),
(5, 1, '¿Qué tipo de aprendizaje automático es más adecuado para predecir la categoría de una observación basándose en datos previamente etiquetados?', 'Aprendizaje supervisado', 'Aprendizaje no supervisado', 'Aprendizaje reforzado', 'Aprendizaje profundo'),
(6, 1, '¿Cuál de las siguientes técnicas se utiliza para reducir la dimensionalidad de los datos conservando la mayor cantidad posible de información?', 'PCA (Análisis de Componentes Principales)', 'K-Means', 'Regresión lineal', 'Árboles de decisión'),
(7, 1, '¿Qué biblioteca de Python es ampliamente utilizada para manipular y realizar operaciones en conjuntos de datos?', 'Pandas', 'NumPy', 'Matplotlib', 'Scikit-learn'),
(8, 2, '¿Qué es un algoritmo?', 'Un conjunto de instrucciones paso a paso para resolver un problema', 'Un lenguaje de programación', 'Un dispositivo de hardware', 'Un archivo de datos'),
(9, 2, '¿Qué es un bucle \"for\" en programación?', 'Una estructura que repite un bloque de código un número determinado de veces', 'Una declaración que permite tomar decisiones basadas en condiciones', 'Una función que organiza los datos en una estructura específica', 'Una manera de definir una variable en Python'),
(10, 2, '¿Qué es la programación orientada a objetos?', 'Un paradigma de programación que organiza el software en objetos que interactúan entre sí', 'Un tipo de lenguaje de programación muy antiguo', 'Un conjunto de instrucciones para resolver problemas matemáticos', 'Una forma de optimizar algoritmos'),
(11, 2, '¿Qué es una variable en programación?', 'Un contenedor para almacenar datos que pueden cambiar durante la ejecución de un programa', 'Una constante que no puede ser modificada', 'Una función que devuelve un valor específico', 'Una condición que determina el flujo del programa'),
(12, 2, '¿Cuál de los siguientes es un tipo de dato comúnmente utilizado en programación?', 'Cadena (string)', 'Color', 'Página web', 'Temperatura'),
(13, 2, '¿Qué es un \"if\" en programación?', 'Una estructura de control que permite tomar decisiones basadas en condiciones', 'Un bucle que repite un bloque de código un número determinado de veces', 'Una función que convierte una cadena a minúsculas', 'Una instrucción que imprime datos en la consola'),
(14, 2, '¿Qué es un \"array\" en programación?', 'Una estructura de datos que contiene una colección ordenada de elementos del mismo tipo', 'Una función que calcula el promedio de una lista de números', 'Una variable que almacena una secuencia de caracteres', 'Un tipo de dato utilizado para representar números enteros'),
(15, 3, '¿Qué biblioteca de Python es comúnmente utilizada para la manipulación y análisis de datos tabulares?', 'Pandas', 'Matplotlib', 'TensorFlow', 'Scikit-learn'),
(16, 3, '¿Cuál es la estructura de datos principal utilizada por Pandas para representar datos tabulares?', 'DataFrame', 'Array', 'Lista', 'Diccionario'),
(17, 3, '¿Qué método de Pandas se utiliza para eliminar filas con valores nulos de un DataFrame?', 'dropna()', 'fillna()', 'isnull()', 'drop()'),
(18, 3, '¿Qué método se utiliza en Pandas para fusionar dos DataFrames basándose en una columna en común?', 'merge()', 'concat()', 'join()', 'combine()'),
(19, 3, '¿Qué función se utiliza en Pandas para aplicar una función a cada elemento de un DataFrame?', 'apply()', 'map()', 'transform()', 'applymap()'),
(20, 3, '¿Cuál de los siguientes no es un tipo de operación común en la manipulación de datos con Pandas?', 'join()', 'filter()', 'groupby()', 'pivot()'),
(21, 3, '¿Qué método se utiliza en Pandas para cambiar el nombre de una columna en un DataFrame?', 'rename()', 'change()', 'modify()', 'edit()'),
(22, 4, '¿Qué tipo de gráfico es más adecuado para mostrar la distribución de una variable numérica?', 'Histograma', 'Gráfico de barras', 'Diagrama de dispersión', 'Gráfico circular'),
(23, 4, '¿Qué tipo de gráfico es útil para visualizar la relación entre dos variables numéricas?', 'Diagrama de dispersión', 'Histograma', 'Gráfico de barras', 'Gráfico circular'),
(24, 4, '¿Qué tipo de gráfico es adecuado para comparar categorías utilizando barras horizontales?', 'Gráfico de barras horizontales', 'Gráfico de barras verticales', 'Histograma', 'Diagrama de dispersión'),
(25, 4, '¿Qué tipo de gráfico es útil para mostrar la distribución de una variable numérica en función de una o más variables categóricas?', 'Boxplot', 'Histograma', 'Gráfico de barras', 'Diagrama de dispersión'),
(26, 4, '¿Qué tipo de gráfico es adecuado para mostrar la relación entre tres variables utilizando burbujas de diferentes tamaños y colores?', 'Gráfico de burbujas', 'Diagrama de dispersión tridimensional', 'Gráfico de barras', 'Diagrama de área'),
(27, 4, '¿Qué tipo de gráfico es útil para mostrar la distribución de una variable numérica en relación con otra variable categórica?', 'Boxplot', 'Gráfico de barras', 'Diagrama de dispersión', 'Histograma'),
(28, 4, '¿Qué tipo de gráfico es adecuado para mostrar la distribución de una variable numérica dividida en grupos?', 'Boxplot', 'Gráfico de barras', 'Histograma', 'Diagrama de dispersión'),
(29, 5, '¿Qué tipo de aprendizaje automático se utiliza para predecir una variable categórica?', 'Aprendizaje supervisado', 'Aprendizaje no supervisado', 'Aprendizaje reforzado', 'Aprendizaje profundo'),
(30, 5, '¿Qué tipo de aprendizaje automático se utiliza para encontrar patrones y estructuras ocultas en los datos sin la necesidad de etiquetas?', 'Aprendizaje no supervisado', 'Aprendizaje supervisado', 'Aprendizaje reforzado', 'Aprendizaje profundo'),
(31, 5, '¿Qué métrica de evaluación se utiliza comúnmente para evaluar el rendimiento de un modelo de clasificación?', 'Precisión', 'RMSE (Error cuadrático medio de la raíz)', 'R cuadrado', 'MAE (Error absoluto medio)'),
(32, 5, '¿Cuál de los siguientes algoritmos de aprendizaje automático se utiliza comúnmente para problemas de clasificación?', 'Regresión logística', 'Regresión lineal', 'K-Means', 'PCA (Análisis de componentes principales)'),
(33, 5, '¿Cuál de los siguientes algoritmos de aprendizaje automático se utiliza comúnmente para problemas de regresión?', 'Regresión lineal', 'K-Means', 'Regresión logística', 'SVM (Máquinas de vectores de soporte)'),
(34, 5, '¿Qué técnica de aprendizaje automático se utiliza para reducir la dimensionalidad de un conjunto de datos conservando la mayor cantidad posible de información?', 'PCA (Análisis de Componentes Principales)', 'K-Means', 'Regresión lineal', 'Árboles de decisión'),
(35, 5, '¿Cuál de los siguientes no es un paso común en el proceso de entrenamiento de un modelo de aprendizaje automático?', 'Decidir el número de clusters en K-Means', 'Dividir los datos en conjuntos de entrenamiento y prueba', 'Seleccionar un algoritmo de aprendizaje automático', 'Evaluar el rendimiento del modelo en datos de prueba'),
(36, 6, '¿Cuál de las siguientes redes neuronales es utilizada comúnmente para el procesamiento de imágenes?', 'Redes Neuronales Convolucionales (CNN)', 'Redes Neuronales Recurrentes (RNN)', 'Perceptrón multicapa', 'Redes Adversarias Generativas (GAN)'),
(37, 6, '¿Qué función de activación se utiliza comúnmente en la capa de salida de un modelo de clasificación binaria?', 'Función de activación sigmoide', 'Función de activación ReLU', 'Función de activación tanh', 'Función de activación softmax'),
(38, 6, '¿Cuál de las siguientes afirmaciones sobre el proceso de entrenamiento en aprendizaje profundo es verdadera?', 'El modelo ajusta los pesos de las conexiones entre neuronas para minimizar la función de pérdida', 'El modelo selecciona aleatoriamente las características relevantes del conjunto de datos', 'El modelo no requiere una etapa de entrenamiento', 'El modelo aplica una transformación lineal a los datos de entrada'),
(39, 6, '¿Qué técnica se utiliza para evitar el sobreajuste en modelos de aprendizaje profundo?', 'Regularización', 'Data augmentation', 'Optimización del learning rate', 'Inicialización de pesos aleatorios'),
(40, 6, '¿Qué arquitectura de red neuronal es adecuada para secuencias de datos, como texto o series temporales?', 'Redes Neuronales Recurrentes (RNN)', 'Redes Neuronales Convolucionales (CNN)', 'Perceptrón multicapa', 'Redes Adversarias Generativas (GAN)'),
(41, 6, '¿Qué es una capa de convolución en una red neuronal convolucional (CNN)?', 'Una capa que aplica filtros a regiones locales de la entrada', 'Una capa que reduce la dimensionalidad de los datos de entrada', 'Una capa que conecta todas las neuronas entre sí', 'Una capa que agrega información de contexto a la entrada'),
(42, 6, '¿Cuál de las siguientes tareas es comúnmente abordada utilizando redes neuronales generativas (GAN)?', 'Generación de imágenes realistas', 'Clasificación de imágenes', 'Detección de anomalías en series temporales', 'Reconocimiento de objetos en imágenes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_verd_fal`
--

CREATE TABLE `pregunta_verd_fal` (
  `id_pregunta` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `pregunta` varchar(250) NOT NULL,
  `respuesta_correcta` varchar(20) NOT NULL,
  `respuesta_incorrecta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta_verd_fal`
--

INSERT INTO `pregunta_verd_fal` (`id_pregunta`, `id_tema`, `pregunta`, `respuesta_correcta`, `respuesta_incorrecta`) VALUES
(1, 1, 'En la ciencia de datos, el preprocesamiento de datos es una etapa crucial para garantizar la calidad de los datos antes de analizarlos.', 'Verdadero', 'Falso'),
(2, 1, 'El objetivo principal del aprendizaje no supervisado es predecir la variable de salida basándose en las características de entrada.', 'Falso', 'Verdadero'),
(3, 1, 'Las bibliotecas como Pandas y NumPy son ampliamente utilizadas en Python para manipular y realizar operaciones en conjuntos de datos.', 'Verdadero', 'Falso'),
(4, 2, 'En programación, un bucle \"for\" se utiliza para repetir un bloque de código un número determinado de veces.', 'Verdadero', 'Falso'),
(5, 2, 'La programación orientada a objetos es un paradigma que organiza el software en objetos que interactúan entre sí.', 'Falso', 'Verdadero'),
(6, 2, 'Una variable en programación es un contenedor para almacenar datos que no pueden cambiar durante la ejecución de un programa.', 'Falso', 'Verdadero'),
(7, 3, 'En Pandas, el método \"dropna()\" se utiliza para llenar los valores faltantes en un DataFrame.', 'Falso', 'Verdadero'),
(8, 3, 'La función \"apply()\" en Pandas se utiliza para aplicar una función a cada elemento de un DataFrame.', 'Verdadero', 'Falso'),
(9, 3, 'Pandas no ofrece métodos para fusionar dos DataFrames basándose en una columna en común.', 'Falso', 'Verdadero'),
(10, 4, 'Los gráficos de barras son adecuados para visualizar la distribución de una variable numérica.', 'Falso', 'Verdadero'),
(11, 4, 'Los gráficos de burbujas se utilizan para mostrar la relación entre tres variables utilizando burbujas de diferentes tamaños y colores.', 'Verdadero', 'Falso'),
(12, 4, 'Los histogramas son útiles para comparar categorías utilizando barras horizontales.', 'Falso', 'Verdadero'),
(13, 5, 'En el aprendizaje no supervisado, se necesita etiquetar los datos antes de entrenar el modelo.', 'Falso', 'Verdadero'),
(14, 5, 'El error cuadrático medio (RMSE) es una métrica comúnmente utilizada para evaluar el rendimiento de un modelo de clasificación.', 'Falso', 'Verdadero'),
(15, 5, 'El algoritmo de regresión logística se utiliza comúnmente para problemas de clasificación.', 'Verdadero', 'Falso'),
(16, 6, 'Una red neuronal recurrente (RNN) es adecuada para procesar datos secuenciales como texto o series temporales.', 'Verdadero', 'Falso'),
(17, 6, 'ReLU (Rectified Linear Unit) es la función de activación más comúnmente utilizada en las capas ocultas de una red neuronal profunda.', 'Falso', 'Verdadero'),
(18, 6, 'Las redes neuronales convolucionales (CNN) son más comúnmente utilizadas para problemas de procesamiento de lenguaje natural (NLP) que para reconocimiento de imágenes.', 'Falso', 'Verdadero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL,
  `nombre_tema` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`id_tema`, `nombre_tema`) VALUES
(1, 'Introducción a la Ciencia de Datos'),
(2, 'Fundamentos de Programación'),
(3, 'Manipulación de Datos'),
(4, 'Visualización de Datos'),
(5, 'Aprendizaje Automático (Machine Learning)'),
(6, 'Aprendizaje Profundo (Deep Learning)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `direccion`, `telefono`, `email`) VALUES
(1, 'BR105', '$2y$10$yBXPtsz9FDuP/RVU5pGDZ.EJdRP9rQzCYVSxkLmjzGt', 'nose', '7896789689', 'anonimoalguien677@gmail.c'),
(2, 'richilm', '$2y$10$qgJIUvxWechEWJoEdY1X9Oi61h9yXNl9mI3AaOWeAP4VYS9hbltOu', 'Cuautitlan', '5522132454', 'fanwindygirk.rlom@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_usuario`,`id_tema`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `evaluacion_multiple`
--
ALTER TABLE `evaluacion_multiple`
  ADD PRIMARY KEY (`id_usuario`,`id_pregunta`,`id_tema`),
  ADD KEY `id_pregunta` (`id_pregunta`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `evaluacion_verdadero_fal`
--
ALTER TABLE `evaluacion_verdadero_fal`
  ADD PRIMARY KEY (`id_usuario`,`id_pregunta`,`id_tema`),
  ADD KEY `id_pregunta` (`id_pregunta`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `pregunta_opmultiple`
--
ALTER TABLE `pregunta_opmultiple`
  ADD PRIMARY KEY (`id_pregunta`,`id_tema`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `pregunta_verd_fal`
--
ALTER TABLE `pregunta_verd_fal`
  ADD PRIMARY KEY (`id_pregunta`,`id_tema`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`);

--
-- Filtros para la tabla `evaluacion_multiple`
--
ALTER TABLE `evaluacion_multiple`
  ADD CONSTRAINT `evaluacion_multiple_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `evaluacion_multiple_ibfk_2` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta_opmultiple` (`id_pregunta`),
  ADD CONSTRAINT `evaluacion_multiple_ibfk_3` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`);

--
-- Filtros para la tabla `evaluacion_verdadero_fal`
--
ALTER TABLE `evaluacion_verdadero_fal`
  ADD CONSTRAINT `evaluacion_verdadero_fal_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `evaluacion_verdadero_fal_ibfk_2` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta_verd_fal` (`id_pregunta`),
  ADD CONSTRAINT `evaluacion_verdadero_fal_ibfk_3` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`);

--
-- Filtros para la tabla `pregunta_opmultiple`
--
ALTER TABLE `pregunta_opmultiple`
  ADD CONSTRAINT `pregunta_opmultiple_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`);

--
-- Filtros para la tabla `pregunta_verd_fal`
--
ALTER TABLE `pregunta_verd_fal`
  ADD CONSTRAINT `pregunta_verd_fal_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
