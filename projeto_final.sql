-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jan-2015 às 19:29
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projeto_final`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
`id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `noticia_id` int(10) unsigned DEFAULT NULL,
  `texto` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `usuario_id`, `noticia_id`, `texto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8, 37, 'Foo Fighters!!!', '2015-01-26 18:18:33', '2015-01-26 18:18:33', NULL),
(2, 8, 37, 'YEAAH', '2015-01-26 18:27:57', '2015-01-26 18:27:57', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_01_22_202245_create_tables_usuarios_noticias_comentarios', 1),
('2015_01_23_000239_add_columns_privilegios_on_usuarios_genero_on_noticias', 1),
('2015_01_23_162925_add_column_destaque_on_noticias', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
`id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texto` text COLLATE utf8_unicode_ci NOT NULL,
  `foto_capa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destaque` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `usuario_id`, `titulo`, `texto`, `foto_capa`, `created_at`, `updated_at`, `deleted_at`, `genero`, `destaque`) VALUES
(26, 8, 'MEC divulga aprovados no Sisu 2015', 'O Ministério da Educação divulgou na manhã desta segunda-feira (26) a primeira chamada de aprovados na edição do primeiro semestre do Sistema de Seleção Unificada (Sisu) de 2015. Um total de 2.791.334 candidatos se inscreveram para concorrer às 205.514 vagas de 5.631 cursos em universidades federais e institutos tecnológicos.\r\n\r\nA lista de aprovados está disponível no site do processo seletivo: sisu.mec.gov.br. O Sisu usa como critério de seleção a nota do candidato no Exame Nacional do Ensino Médio (Enem) de 2014. O candidato pode consultar seu desempenho inserindo o número de inscrição no Enem e a senha de inscrição. O site permite ainda recuperar a senha do Enem.\r\nNo site do Sisu, é possível selecionar a instituição, o curso e a modalidade do turno para filtrar a lista de aprovados.\r\nMatrícula\r\nOs candidatos aprovados deverão fazer a matrícula nos dias 30 de janeiro, 2 e 3 de fevereiro nas instituições de ensino que oferecem as vagas, apresentando os documentos exigidos por elas e pela lei federal de cotas.\r\nO candidato selecionado pelo Sisu deverá verificar, junto à instituição de ensino em que foi aprovado, o local, horário e procedimentos para matrícula.\r\n\r\nMuitos candidatos foram aprovados em instituições de outra cidade ou até outro estado em relação aonde residem. A especialista em educação, Andrea Ramal, colunista do G1, dá dicas para as famílias que vão ver o filho estudar longe. Veja as dicas\r\nNão passou? Veja o que fazer\r\nQuem não foi aprovado pode se inscrever na lista de espera até o dia 6 de fevereiro e acompanhar as chamadas que serão feitas a partir de 11 de fevereiro. A participação na lista de espera somente poderá ser feita na primeira opção de vaga do candidato.\r\nDo total de vagas ofertadas por universidades federais, institutos tecnológicos e universidades estaduais nesta primeira edição do Sisu, 82.879 (ou 40%) estão destinadas a estudantes que atendam aos quesitos da Lei de Cotas, ou seja, que tenham cursado todo o ensino médio em escolas públicas.\r\nPela lei, neste processo seletivo do Sisu, pelo menos 37,5% de suas vagas são para cotistas. Até 2016, as instituições deverão atingir o percentual de 50% de vagas reservadas.\r\nAlém da Lei de Cotas, algumas instituições promovem reserva de vagas por ações afirmativas, como vaga para deficientes, quilombolas ou um índice maior para alunos negros, pardos ou indígenas. No total, 12.825 vagas do Sisu são reservadas para ações afirmativas das universidades e institutos.\r\n\r\nProuni x Sisu\r\n\r\nOutra opção para os alunos que não forem aprovados nas universidades públicas pelo Sisu é se inscrever no Prouni. O programa concede bolsas de estudo integrais e parciais (50%) em instituições privadas de ensino superior, em cursos de graduação e sequenciais de formação específica, a estudantes brasileiros sem diploma de nível superior. As inscrições foram abertas nesta segunda-feira.\r\nO candidato do Prouni precisa ter feito ensino médio em escola pública ou como bolsista em escola particular.\r\nMesmo quem é aprovado no Sisu em uma universidade pública em outra cidade ou estado, mas não pode se mudar, costuma optar por fazer uma faculdade particular em seu município com bolsa do Prouni.\r\nO candidato pode se inscrever no Sisu e no Prouni, desde que atenda aos critérios do programa. Mas caso seja selecionado nos dois programas, terá de escolher entre a bolsa do Prouni ou a vaga do Sisu.\r\n\r\nNúmeros do Sisu\r\n- 2.791.334 candidatos inscritos\r\n- 1.595.368 mulheres inscritas (57%)\r\n- 1.195.966 homens inscritos (43%)\r\n- Minas Gerais teve o maior número de inscritos (327.601), seguido por São Paulo (306.956), Rio de Janeiro (249.252), Bahia (208.231) e Ceará (182.581)\r\n- 51,9% das inscrições foram pela ampla concorrência, 42,7% pela lei de cotas, e ainda 5,4% para ações afirmativas. A relação candidato por vaga pela lei de cotas é maior que na ampla concorrência (27,99 contra 25,66)\r\n- O curso de arquitetura e urbanismo do Instituto Federal de São Paulo (IFSP) foi o mais procurado, com 13.777 inscrições\r\n- Entre as universidades federais, o curso mais procurado foi medicina da Universidade Federal de Minas Gerais (UFMG), com 12.062 inscrições (75,39 candidatos por vaga)\r\n- A Universidade Federal do Ceará (UFC) teve o maior número de inscrições (187.563), seguida pela UFMG (186.881), UFPE (177.235), UFRJ (174.110) e UFBA (149.487)\r\n- Administração é a carreira mais procurada do Sisu, com 312.991 candidatos para 7.541 vagas. Em seguida vem direito (262.255 inscritos), pedagogia (249.348), medicina (237.267) e educação física 192.866\r\n- Entre as universidades que colocam 100% das vagas no Sisu e não dão bônus por ação afirmativa, o curso com maior nota de corte foi o de direito da Universidade Federal Fluminense (UFF), com 830,39 pontos (veja ao lado a tabela com as dez maiores notas de corte)', '1422290669.jpg', '2015-01-26 18:44:29', '2015-01-26 18:44:29', NULL, 'mundo', 1),
(27, 8, 'Grupo protesta contra a falta d''água na sede do governo de SP', 'Manifestantes fecharam a Avenida Morumbi, na Zona Sul de São Paulo, em frente ao Palácio dos Bandeirantes, na manhã desta segunda-feira (26), para pedir que o governador Geraldo Alckmin assuma a gravidade da crise hídrica por qual o estado passa. A via ficou parcialmente interditada por cerca de duas horas.\r\n \r\nSegundo a coordenadora institucional da Associação Brasileira de Defesa do Consumidor (Proteste), que organizou o ato desta segunda, Maria Inês Dolcci, "o governador tem que admitir que há racionamento e detalhar o que esta sendo feito pra contornar a falta de água".\r\n"Ele tem que vir a público para dizer que estamos diantes de uma grave crise hídrica. Ele mentiu no ano passado, durante a campanha, ao dizer que não faltaria água. Ele precisa liderar um grande trabalho de conscientização, porque existe uma falsa sensação de segurança hídrica", completou o educador popular Daniel Aymoré Ferreira. De acordo com o manifestante, a localização do Palácio do Governo prejudicou a mobilização de participantes. "Segunda-feira, às 10h, a localização do Palácio dos Bandeirantes, sem transporte público, sem ciclovia, tudo isso prejudica", disse.\r\n\r\nA drag queen Tchaka chamou a atenção e arrancou risos durante o protesto. Em uma caixa de isopor ela levou “geladinhos” para distribuir para a imprensa. Depois de estender uma canga no asfalto e fazer foto com os cartazes, ela também limpou a seco uma placa que sinaliza a entrada de visitantes do Palácio do Governo.\r\nOs manifestantes fecharam a Avenida Morumbi, no sentido Ponte do Morumbi, por cinco minutos por volta das 10h15. Mais tarde, pouco depois de 11h20, os manifestantes se sentaram no chão e estenderam faixas com as mensagens: "Qual é o plano B" e "Planeta Água, Vidas Secas". A Polícia Militar orientou o trânsito, que ficou prejudicado. O sentido bairro da avenida chegou a ficar completamente bloqueado pela PM. Quem trafegava no sentido bairro passava apenas por uma faixa, na contramão. Por volta de meio-dia, a manifestação foi encerrada. Não houve registro de incidentes.\r\n\r\nUma chuva moderada interrompeu duas semanas seguidas de queda no Sistema Cantareira, que manteve nesta segunda-feira (26) o mesmo nível de domingo: 5,1%, consideradas as duas cotas do volume morto, segundo a Sabesp. A água armazenada no manancial, no entanto, não sobe há um mês, e as chuvas na área neste ano ainda representam 41,8% do previsto para janeiro.\r\nNo início do mês, a Proteste conseguiu liminar na Fazenda Pública do Estado de São Paulo para barrar a multa de até 100% na conta de água para o consumidor que exceder a média de consumo, até que o governo estadual decrete oficialmente o racionamento. O governo estadual recorreu e derrubou a liminar que barrava a multa. Agora, a Proteste afirmou que entrou nesta segunda-feira com um agravo regimental no Tribunal de Justiça para pedir que o governo assuma o racionamento de água.\r\nOs integrantes do Proteste são favoráveis à sobretaxa, mas defendem que ela só pode vigorar depois que o governo estadual assumir a existência do racionamento como prevê a Lei Federal 11.445/2007. "A lei federal é bastante clara: só pode cobrar uma sobretaxa se for oficializado o racionamento. Se querem cobrar uma tarifa adicional, o governo também tem que fazer a sua parte. Todos juntos podem buscar uma solução. O que não pode é o consumidor ser desrespeitado e não saber a respeito do corte da sua água", afirmou.\r\nVai-e-vem da multa\r\nA Sabesp foi autorizada pela Agência Reguladora de Saneamento e Energia do Estado de São Paulo (Arsesp) a aplicar multa de 40% a 100% para quem consumir mais água neste ano no comparativo entre fevereiro de 2013 e janeiro de 2014.\r\nMas, na terça-feira (13), a juíza Simone Leme avaliou ação protocolada pela Associação Brasileira de Defesa do Consumidor (Proteste). Ela concedeu uma decisão provisória (liminar).\r\nNo despacho, a juíza disse que "o racionamento é oficioso e não atinge a população paulista de forma equânime com deveria". Ela também cobrou da companhia de abastecimento a eliminação das perdas e campanha de esclarecimento antes de impor multa.\r\nPrejuízo à saúde pública\r\nApós recurso do PGE, o desembargador José Renato Nalini afirmou que inibir a implantação da tarifa de contingência poderia causar prejuízo à saúde pública.\r\n“Ninguém sobrevive sem água. A tarifa de contingência obteria economia aproximada a 2.500 litros por segundo, volume capaz de abastecer mais de 2 milhões de consumidores”, afirmou.\r\nSegundo o presidente do TJ, a implantação da tarifa de contingência observou o artigo 46 da Lei Federal nº 11.445/2007, que autoriza a adoção de mecanismos tarifários para cobrir custos decorrentes de situação crítica.\r\n“Em momento algum a lei condiciona a adoção legal a uma formal e prévia decretação de racionamento. Está presente e perdura há meses a situação muito além de crítica na escassez dos recursos hídricos”, afirmou o desembargador.\r\nRedução de pressão\r\nNa decisão liminar de terça-feira, a juíza Simone Viegas de Moraes Leme também cobrou que a Sabesp informasse os bairros atingidos por "manobras ou redução de pressão". Assim como Alckmin, a Sabesp também admitiu, pela primeira vez, que toda a Região Metropolitana está com redução de pressão no abastecimento e divulgou mapa das áreas afetadas.', '1422290780.jpg', '2015-01-26 18:46:20', '2015-01-26 18:46:20', NULL, 'mundo', 1),
(28, 8, 'Colombiana Paulina Vega vence o Miss Universo', 'A candidata da Colômbia, Paulina Vega, venceu, na madrugada desta segunda-feira (26), o Miss Universo 2014. A 63ª edição do concurso de beleza foi realizada em Miami. Ao todo, 88 candidatas disputaram a coroa, entre elas a cearense Melissa Gurgel, Miss Brasil 2014.\r\nA vencedora do concurso recebeu a coroa da venezuelana Gabriela Isler, de 26 anos. De acordo com a organização do concurso, Paulina tem 22 anos e nasceu na cidade de Barranquilha. Ela é estudante de administração de empresas e trabalha como modelo desde os 8 anos.\r\nEm segundo lugar ficou a candidata dos Estados Unidos, Nia Sanchez. Ela foi seguida da Miss Ucrânia, Diana Harkusha; da Miss Holanda, Yasmin Verheijen; e da Miss Jamaica, Kaci Fenell.\r\n\r\nA candidata brasileira Melissa Gurgel ficou entre as 15 semifinalistas, mas foi eliminada após o desfile em trajes de banho. O estilista Alexandre Dutra, já conhecido no universo das misses, assinou o vestido de gala e o traje típico usados pela Miss Brasil.', '1422290971.jpg', '2015-01-26 18:49:31', '2015-01-26 18:49:31', NULL, 'mundo', 1),
(29, 8, 'EUA cancelam 1,8 mil voos à espera de nevasca histórica', 'A Costa Leste dos os Estados Unidos, da cidade de Filadélfia, passando por Nova York e seguindo até o Estado do Maine, se preparava nesta segunda-feira (26) para uma nevasca possivelmente histórica, que os meteorologistas dizem que pode despejar até 90 centímetros de neve na região e prejudicar o transporte de dezenas de milhões de pessoas.\r\nO Serviço Meteorológico Nacional (NWS, na sigla em inglês) emitiu um alerta de tempestade de neve para a parte norte da Costa Leste a partir da tarde desta segunda, colocando os Estados de Nova Jersey até Indiana de sobreaviso e alerta para tempestades de inverno até terça-feira (27). Companhias aéreas cancelaram cerca de 1.800 voos.\r\n"Esta pode ser a maior tempestade de neve na história desta cidade", disse o prefeito de Nova York, Bill de Blasio, em entrevista coletiva na tarde de domingo, dizendo que a queda de neve pode chegar a até 90 centímetros.\r\nsaiba mais\r\nNordeste americano se prepara para nevascas e tempestade histórica\r\nDe Blasio pediu aos moradores da capital financeira dos EUA e cidade mais populosa do país que fiquem fora das estradas e "se prepararem para algo pior do que já vimos até agora".\r\nA maior precipitação registrada em Nova York ocorreu durante a tempestade de 11-12 fevereiro de 2006, com queda de 68 centímetros de neve, de acordo com o órgão municipal de gerenciamento de emergências.\r\nO NWS qualificou o sistema que se aproxima como uma "nevasca incapacitante e possivelmente histórica", e assinalou que muitas áreas ao longo da Costa Leste deverão ficar cobertas por 30 a 60 centímetros de neve. A área de Nova York poderia ser a mais afetada, com fortes ventos e queda de neve de 76 centímetros ou mais em alguns subúrbios.\r\nA Delta Air Lines anunciou no domingo que estava cancelando 600 voos por causa do alerta de nevasca para a Costa Leste. Já a United Airlines não vai liberar nenhum voo na terça nos aeroportos de Nova York, Boston e Filadélfia, e vai limitar as operações a partir desta segunda à noite nos aeroportos de Newark, LaGuardia e John F. Kennedy, na área de Nova York, disse uma porta-voz.\r\nA Southwest Airlines informou no domingo à noite que iria cancelar mais de 130 dos 3.410 voos programados para esta segunda-feira devido à tempestade, um aumento em relação a seu plano anterior de cortar cerca de 20 voos.\r\nA American Airlines ainda não havia finalizado os planos de cancelamento, mas disse esperar que "muito poucos" voos sejam afetados. De acordo com o site que rastreia voos no país Flightaware.com, desde domingo à noite 1.792 voos haviam sido cancelados para esta segunda-feira.', '1422291828.jpg', '2015-01-26 19:03:48', '2015-01-26 19:03:48', NULL, 'mundo', 0),
(30, 8, 'Espanhol pega escanteio de primeira e faz um golaço na Bélgica', 'O espanhol Víctor Curto Ortiz, de 32 anos, fez o que pode ser um dos candidatos ao Prêmio Puskas de 2015. Aconteceu na última sexta-feira, quando anotou três vezes na goleada do seu AS Eupen sobre o Racing Mechelen, por 5 a 1, pela Segunda Divisão do Campeonato Belga. Após escanteio da esquerda, ele se posicionou na entrada da área e acertou um lindo voleio, no ângulo do goleiro adversário.', '1422292467.jpg', '2015-01-26 19:14:27', '2015-01-26 19:15:27', NULL, 'esportes', 0),
(31, 8, 'Messi não se segura e também zoa o tênis de ursinho de Daniel Alves', 'A ousadia de Daniel Alves na forma de se vestir não para. Adepto de roupas e acessórios diferentes do comum, o lateral exibiu nas redes sociais, nesta segunda-feira, um tênis chamativo: dourado, brilhante e com um ursinho na frente. Com isso, o brasileiro despertou até mesmo uma zoação do companheiro Messi, que costuma ser discreto. O camisa 10 usou a rede social para perguntar aos fãs se sabiam de quem era o tênis - e seus seguidores foram certeiros ao dizer que era de Dani Alves.\r\n\r\nLogo depois, Daniel Alves postou um vídeo (confira aqui) em que aparecia com um urso supostamente dado pelos atletas em tom de brincadeira. Ele dizia ser o "pai" dos tênis que estava usando.\r\n- Agora que trouxeram seu pai a gente pode ir embora? Tá feliz? Muito feliz? Só tem traíra aqui (risos) - disse o lateral.', '1422292596.jpg', '2015-01-26 19:16:36', '2015-01-26 19:16:36', NULL, 'esportes', 0),
(32, 8, 'Bottas estreará nova Williams em Jerez', 'Faltando poucos dias para o início dos testes de pré-temporada da Fórmula 1, a Williams foi mais uma equipe a anunciar a programação para a sessão que será realizada de 1º a 4 de fevereiro no circuito espanhol de Jerez de la Frontera. O finlandês Valtteri Bottas terá a chance de experimentar primeiro o novo FW37 da escudeira inglesa. Ele assumirá o volante no domingo e na segunda-feira. Já o brasileiro Felipe Massa será o responsável por fechar as atividades, guiando o carro na terça-feira e na quarta-feira. \r\nAlém da Williams, já confirmaram a escalação para os testes de Jerez os seguintes times:  Mercedes, Ferrari, McLaren, STR e Sauber. Apenas RBR, Force India e Lotus não divulgaram a programação.Depois dos testes de Jerez serão realizadas mais duas sessões, ambas em Barcelona, de 19 a 22 de fevereiro, e de 26 de fevereiro a 1º de março. A temporada 2015 da Fórmula 1 começa com o GP da Austrália, de 13 a 15 de março, em Melbourne. ', '1422292763.jpg', '2015-01-26 19:19:23', '2015-01-26 19:19:23', NULL, 'esportes', 1),
(33, 8, 'Estagnou no treinamento? Saiba o que fazer para voltar a melhorar', 'Se você já treina há alguns anos, talvez já tenha experimentado uma fase em que não ocorrem melhoras. Seu condicionamento físico simplesmente estaciona. Isso é um sinal da necessidade de observar o que está sendo feito e direcionar algumas mudanças. Alguns entendimentos básicos de fisiologia podem ajudá-lo nesse processo.\r\nQuando o seu negócio é acelerar na corrida e baixar tempo, atingir um ponto em que você para de melhorar pode significar, entre outras, três coisas: você atingiu o seu potencial máximo e o seu DNA não o deixa ir além, você está treinando de menos e atingir o objetivo começa a demandar mais dedicação e tempo ou está treinando demais e sobrecarregando o seu sistema. Faça essa avaliação com cuidado, pois as melhoras para os mais avançados são pequenas e custosas mesmo. Confira algumas sugestões para evitar ou sair dessa zona desconfortável:\r\n1)  Se sentir que está treinando demais, desacelere, tire o pé mesmo. Esse excesso não o levará à lugar algum. Talvez você já precise de mais descanso há algum tempo e o corpo está cobrando a conta - e esse período pegando mais leve ou de total descanso é, de alguma maneira, proporcional ao tempo que passou pegando pesado.\r\n2)  Suplementar a alimentação? Provavelmente você não consegue extrair tudo que precisa da sua dieta. Indicado a consulta com o nutricionista.\r\n3)  Verifique se está dormindo o suficiente para acordar descansado e disposto para as tarefas do dia. Talvez você precise dormir mais ou melhor.\r\n4)  Está treinando de menos? Talvez seja a hora de aumentar as intensidades em alguns treinos ou se dedicar um pouco mais. Você vai ter que equilibrar o que terá que treinar a mais com o que será possível treinar a mais (diante das tarefas do cotidiano). Mas vá aos poucos, não dá para melhorar um mês em uma semana.', '1422293044.jpg', '2015-01-26 19:24:04', '2015-01-26 19:24:04', NULL, 'esportes', 0),
(34, 8, 'Carol Castro lembra mau humor ao cortar lactose: ''Ratinho''', 'A chef e nutricionista Bela Gil convidou a atriz Carol Castro e a cantora Roberta Sá para conhecerem os benefícios e sabores da comida crua, no quarto episódio do Bela Cozinha Verão, que vai ao ar nesta terça (27), às 22h. Enquanto preparavam uma salada, Carol Castro confessou que adorava incrementar as saladas com queijo. "Antes de descobrir a minha intolerância à lactose, eu me enchia de queijo. Eu botava queijo na pipoca. Eu era um ratinho", assume a atriz, completando: "No meu primeiro mês sem lactose, era um mau humor!".\r\nBela Gil explica porque o queijo tem esse poder de viciar. "Quando você se torna vegana, a pessoa deixa de comer qualquer proteína animal. Uma das coisas que ela mais sente falta é do queijo e não da carne. O queijo tem caseína, uma proteína que é um opióide e estimula certas regiões do cérebro".\r\n\r\n"Dá barato?", brinca a cantora Roberta Sá. "E eu aqui alérgica à caseína!", emenda Carol Castro, rindo. ', '1422293207.jpg', '2015-01-26 19:26:47', '2015-01-26 19:26:47', NULL, 'entretenimento', 0),
(35, 8, 'Após 15 anos de união, Patrick Dempsey se separa da esposa', 'Patrick Dempsey, o doutor Derek Shepherd da série ''Grey''s Anatomy'', está separado da esposa, a maquiadora Jillian Fink, com quem se casou em 31 de julho de 1999. Ela pediu o divórcio, citando na requisição oficial que ela e o marido têm "diferenças irreconciliáveis".\r\nO ator de 49 anos e a maquiadora, de 48, assinaram uma nota à imprensa divulgada pelo site ''E! News'': "É com cuidadosa consideração e respeito mútuo que decidimos encerrar nosso casamento. Nossa principal preocupação continua sendo o bem-estar de nossos filhos, e pedimos com profunda gratidão que vocês respeitem a privacidade da nossa família neste momento tão sensível".\r\n\r\nJillian e Patrick têm três filhos juntos: a primogênita, Talula (ou Tallulah; as fontes divergem a respeito da grafia do nome), que está com 12 anos de idade, e os gêmeos Darby e Sullivan, de 7.\r\n\r\nDe 1987 a 1994, Patrick Dempsey havia sido casado com a atriz Rocky Parker, que era 16 anos mais velha do que ele e veio a falecer em abril de 2014. Eles haviam se conhecido durante as gravações da comédia romântica ''Casanova Junior'' (1987).', '1422293380.jpg', '2015-01-26 19:29:40', '2015-01-26 19:29:40', NULL, 'entretenimento', 1),
(36, 8, 'Os livros que vão invadir os cinemas em 2015', 'Agora que a primeira temporada de The Librarians terminou os nossos heróis poderão descansar e aproveitar a infinidade de livros que a biblioteca dispõe. Romances, ficção cientifica, dramas, comédias, têm para todos os gostos.\r\n\r\nEm 2015 muitas dessas obras vão ganhar versões cinematográficas, o Canal Universal listou as principais para que os bibliotecários e os fãs possam lê-las antes que cheguem às telonas.\r\n\r\nConheça os filmes mais aguardados de 2015.\r\n\r\nConfira quais livros serão adaptados para o cinema em 2015.\r\n\r\nPara Sempre Alice, Lisa Genova\r\n\r\nJulianne Moore ganhou o Globo de Ouro de Melhor Atriz em Filme Dramático e foi indicada ao Oscar de Melhor Atriz pelo seu trabalho nesta adaptação. O longa conta a história de uma mãe e professor que é diagnostica com Alzheimer.\r\n\r\nThe Mortdecai Trilogy, Kyril Bonfiglioli\r\n\r\nJohnny Depp encarna mais um dos seus personagens excêntricos, o ladrão de arte Charlie Mortdecai. Ele viaja para os Estados Unidos em busca de um quadro que contém informações sobre um cofre cheio de ouro.\r\n\r\nO Aprendiz, Joseph Delaney\r\n\r\nThomas (Ben Barnes) está sendo treinado para ser o novo mago de sua região. Sua primeira misão será enfrentar a maligna Mãe Malkin (Julianne Moore).\r\n\r\nCinquenta Tons de Cinza, E.L. James\r\n \r\nO best-seller sobre o milionário Christian Grey (Jamie Dornan) e seus gostos excêntricos promete ser uma das maiores bilheterias do ano e é um dos filmes mais esperados pelo Canal Universal.\r\n\r\nThe DUFF, Kody Keplinger\r\n\r\nBianca Piper (Mae Whitman) leva uma vida tranquila cercada de suas amigas até o dia em que descobre que ela é conhecida como a “amiga feia” das garotas mais populares do colégio.\r\n\r\nDead Stars, Bruce Wagner\r\n\r\nJulianne Moore ganhou o prêmio de Melhor Atriz no Festival de Cannes de 2014 pela sua interpretação nesta sátira sobre a fama e a cultura de Hollywood.\r\n\r\nIn the Heart of the Sea, Nathaniel Philbrick\r\n\r\nA história real que inspirou o clássico Moby Dick ganha uma grande produção com Chris Hemsworth como protagonista.\r\n\r\nInsurgente, Veronica Roth\r\n\r\nO segundo capítulo da série Divergente traz de volta Tris (Shailene Woodley), Quatro (Theo James) e o resto dos insurgentes na luta contra Jeanine Matthews (Kate Winslet).\r\n\r\nSerena, Ron Rash\r\n\r\nJennifer Lawrence e Bradley Cooper voltam a atuar juntos na adaptação desta história sobre os recém-casados George e Serena Pemberton que estão determinados a construir um império madeireiro a qualquer custo.\r\n\r\nQual destes livros você já leu?', '1422293480.jpg', '2015-01-26 19:31:20', '2015-01-26 19:31:20', NULL, 'entretenimento', 0),
(37, 8, 'Excessos dos Foo Fighters encantam 45 mil cariocas', 'Se o rock tem o exagero como um de seus pilares, a apresentação dos Foo Fighters no Maracanã, que terminou no fim da noite deste domingo depois de duas horas e meia de guitarras, berros e suor, foi um belo exemplo de como se faz rock: um show intenso de uma banda com seis integrantes (três guitarristas) em que músicas que originalmente têm quatro ou cinco minutos eram apresentadas em versões de nove ou dez. Em vários momentos o cantor e líder Dave Grohl pediu "licença" para terminar uma canção, que já tinha se estendido de tal forma e caminhado em tantas direções que o público pensava que tivesse chegado ao fim.\r\n\r\n— Não, não, ainda não acabamos. Tem mais — dizia o roqueiro com um sorriso algo debochado.\r\n\r\nUm show dos Foo Fighters sempre tem mais. A banda, que está em turnê promovendo o disco "Sonic highways" (gravado em oito cidades americanas diferentes, com as participações de músicos locais), começou, às 21h20m, com "Something from nothing", a primeira canção do disco (gravada em Chicago), já bem conhecida do público, e uma sequência de sucessos mais antigos, "The pretender", "Learn to fly" e "Breakout". Suficiente para o público berrar os refrãos e pular, enquanto ouvia de Grohl:\r\n\r\n— Está quente. Mas não o suficiente!\r\n\r\nDepois de "Arlandria", ele assumiu a megalomania:\r\n\r\n— Vamos tocar todas as músicas dos Foo Fighters.\r\n\r\nNão foi exatamente o que aconteceu, mas o show, ao longo de duas horas e meia, teve sucessos, lados B ("Cold day in the sun", cantada pelo baterista Taylor Hawkins), improvisos (como o do guitarrista Pat Smear, que ao ser apresentado puxou "Smoke on the water", do Deep Purple, errado, e a banda foi atrás assim mesmo) e covers. Depois de correr algumas vezes pela passarela que invadia a pista (a premium e a comum), Grohl postou-se no fim dela para olhar de frente o público das arquibancadas (que não chegaram a ficar lotadas, somando 45 mil pessoas de 60 mil possíveis) e, sozinho ao violão, cantar "Skin and bones" e "Wheels" (parte do público se desinteressou do show). Com o chefe de volta ao meio da passarela, a banda toda se reuniu em um pequeno palco giratório para uma espetacular sessão de covers: "Detroit rock city", do Kiss, "Tom Sawyer", do Rush, "Stay with me", dos Faces (com Hawkins cantando e solos de todos) e, finalmente, "Under pressure", do Queen.\r\n\r\nCom o público encharcado (e feliz), bastou à banda voltar ao palco original para mais uma sequência de sucessos: "All my life" e as emocionantes "Best of you" e "Everlong", deixando a impressão de que o rock de estádio pode, afinal, não ter morrido.', '1422293597.jpg', '2015-01-26 19:33:17', '2015-01-26 19:33:17', NULL, 'entretenimento', 1),
(38, 8, 'Facebook lança Lite, versão super leve do app para aparelhos mais antigos', 'Parece que Mark Zuckerberg, fundador da rede social, está mesmo disposto a investir em novos aplicativos e transformar o Facebook em um app mais amplo. Primeiro foi o Groups, lançado no final do ano passado para organizar os grupos pessoais, agora é a vez do Facebook Lite, que ainda está em testes. A ideia é expandir o uso do software para usuários de aparelhos mais antigos ou com desempenho mais fraco, mas pelo jeito o Brasil vai ficar de fora dessa lista, pelo menos por enquanto.\r\nO recurso começou a ser testado em países da África e Ásia como Bangladesh, Nepal, Nigéria, África do Sul, Sudão, Sri-Lanka e Vietnã, nesta última semana. Tudo aconteceu de maneira bem discreta, sem anúncios oficiais. A nova versão apresenta um design mais simples, mas parece incluir as principais funções disponibilizadas pelo aplicativo “completo” do Facebook, como a opção de curtir, comentar, compartilhar, além de trazer um menu oculto com outras funções.\r\n\r\nA construção do app é básica e bem simples, eliminando os extras, e utilizando uma APK com cerca de 252 KB, em vez dos pesados 27 MB que o app tradicional pode alcançar. Além disso ele é baseado em Snaptu, mas inclui notificações no estilo “push” e integração com a câmera, para a postagem de fotos.\r\n\r\nEsses fatores fazem bastante diferença, principalmente nos smartphones de entrada, mais antigos ou que utilizem uma velocidade de Internet mais lenta, por exemplo. Dessa forma, o app fica acessível para mais usuários, sem depender da potência do dispositivo. Sobre a chegada do Facebook Lite no Brasil, a novidade não deve integrar tão cedo os smarts nacionais.', '1422293676.jpg', '2015-01-26 19:34:36', '2015-01-26 19:34:36', NULL, 'tecnologia', 0),
(39, 8, 'PlayStation 4 especial de aniversário é vendido por mais de R$ 300 mil', 'Um PlayStation 4 em edição especial de aniversário de 20 anos do primeiro PlayStation foi vendido por ¥15.135.000, aproximadamente R$ 332 mil, em um leilão beneficente que a Sony realizou para ONG nipônica Save the Children Japan. Além do valor da venda do console, a empresa ainda fez uma doação dobrando a quantia.\r\n\r\nO videogame leiloado é o primeiro PlayStation 4 de uma série comemorativa de 20 anos do PlayStation One. Esta versão troca a tradicional cor preta do console pelo característico cinza do PlayStation original, acompanhando também o clássico logo vermelho. A caixa inclui ainda o suporte vertical do PS4 e a PlayStation Camera.\r\nLançado originalmente em dezembro de 1994 no Japão, o PlayStation One marcou a entrada da Sony no ramo dos consoles, vendendo mais de 100 milhões de unidades, um número extremamente impressionante para a época. Ele liderou sua geração, superando velhos favoritos como Nintendo e Sega, preparando terreno para o sucesso do PlayStation 2.\r\n\r\nVia Kotaku', '1422293723.jpg', '2015-01-26 19:35:23', '2015-01-26 19:35:23', NULL, 'tecnologia', 0),
(40, 8, 'Como fazer logoff e desconectar o WhatsApp aberto no PC de maneira remota', 'O WhatsApp Web finalmente se tornou realidade. O recurso, no entanto, pode trazer problemas para quem usa um computador compartilhado. Se o seu celular estiver conectado à rede Wi-Fi e alguém acessar o WhatsApp Web no computador, suas conversas e contatos serão exibidos automaticamente – apenas na primeira vez que é feito o acesso é necessário fazer o scan o código QR. \r\n\r\nCaso desconfie que alguém esteja acessando o seu WhatsApp através do recurso ou queira evitar, siga a dica e veja como finalizar a sessão do WhatsApp Web pelo celular no Android e Windows Phone.\r\n\r\nAndroid\r\nPasso 1. Toque sobre o botão no canto superior direito da tela e, no menu que aparece, toque em “WhatsApp Web”;\r\nPasso 2. Por fim, toque em “Log out from all computers” e confirme que deseja desconectar o WhatsApp do computador tocando em “Log out”.\r\n\r\nWindows Phone\r\nPasso 1. Toque sobre o botão “…”, no canto inferior direit da tela. No menu do aplicativo, toque em “whatsapp web”;\r\nPasso 2. Em seguida, toque sobre o segundo botão que se encontra na parte inferior da tela. Por fim, toque em “log out” para confirmar e desconectar o seu WhatsApp do computador.\r\n\r\nPronto! Com essa dica simples, você conseguirá desconectar o seu WhatsApp do computador através do celular e impedir que outros usuários acessem as suas conversas em um computador compartilhado.', '1422293967.png', '2015-01-26 19:39:27', '2015-01-26 19:39:27', NULL, 'tecnologia', 0),
(41, 8, 'Galax lança novos modelos de placas da edição NVIDIA GeForce GTX 900', 'A NVIDIA anunciou uma nova versão das GeForce GTX 980 e da GTX 970. As placas de vídeos da linha Hall of Fame (Hall da Fama) têm desempenho acima da média e podem receber overclock para chegar a até 2.1 GHz. Ainda não há preço ou data de disponibilidade oficiais das placas, mas a expectativa é que elas comecem a ser vendidas até o fim do ano. \r\nA GTX 970 HOF tem clock de 1216/1380mhz, enquanto a GTX 980 HOF pode alcançar a marca de 1304/1418mhz. Ambas podem receber overclock e chegar a até 2.1 GHz com LN2, graças a uma engenharia especialmente feita para elas, componentes de altíssima qualidade e a uma unidade de resfriamento bastante potente.\r\n\r\nAs placas são equipadas com unidade de ventilação tripla, com sete heatpipes, quatro de 80mm e 3 de 60mm. Suas conectividades são DVI-I, HDMI e três DIsplayPorts. Elas têm também tecnologia Hyper Boost e dual BIOS. Além disso, elas contam com 8 fases de GPU e 2 fases de VRAM.\r\nAinda não há informações sobre quanto as placas vão custar, nem quando elas chegam às lojas. Voltadas para máquinas em que o processamento gráfico é crucial, elas devem ser um pouco mais caras do que as versões tradicionais da Nvidia.\r\nVia WCCF Tech', '1422294050.jpg', '2015-01-26 19:40:50', '2015-01-26 19:40:50', NULL, 'tecnologia', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(10) unsigned NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `privilegios` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `foto`, `created_at`, `updated_at`, `remember_token`, `deleted_at`, `privilegios`) VALUES
(8, 'Joaquim Ferreira', 'joaquim@nqo.com', '$2y$10$RfRlH/A6L4fqXdJgVXjLOeC8rw09Ksa.VUmx8r35lyLt00tDb.Oo.', '1422290821.png', '2015-01-26 18:42:41', '2015-01-26 18:47:01', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
 ADD PRIMARY KEY (`id`), ADD KEY `comentarios_usuario_id_foreign` (`usuario_id`), ADD KEY `comentarios_noticia_id_foreign` (`noticia_id`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
 ADD PRIMARY KEY (`id`), ADD KEY `noticias_usuario_id_foreign` (`usuario_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuarios_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
ADD CONSTRAINT `comentarios_noticia_id_foreign` FOREIGN KEY (`noticia_id`) REFERENCES `noticias` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `comentarios_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `noticias`
--
ALTER TABLE `noticias`
ADD CONSTRAINT `noticias_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
