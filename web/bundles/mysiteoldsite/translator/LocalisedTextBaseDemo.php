<?
/*
$Author: colineberhardt $
$Date: 2004/11/16 10:26:59 $
$Revision: 1.2 $
$Name:  $

Copyright (C) 2004  C.N.Eberhardt (webmaster@jugglingdb.com)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

/*
This class ....
*/

class LocalisedTextBaseDemo extends LocalisedTextBase
{
	var $config;	
	var $textBase = array
	(
		//English text
		"en" => array (
			"wordSend" => "Send",
			"wordRequired" => "required",
			"wordArticle" => "Article",
			"wordProject" => "Project",
			"wordProjectImages" => "Project images",
			"wordDownloadProject" => "Download All Project",
			"wordPlayGame" => "Play game",
			"wordComment" => "comments",
			"wordBy" => "by",
			"titleHeaderPage" => "Software engineer",
			"waitLoadGame" => "This game starts in a few second...",
			"localeFacebook" => "en_US",
			"cdominguez" => "Carlos Dominguez's Website",
			"title" => "Carlos's Portfolio",
			"visit" =>	" Visit.",
			"home" => "Home",
			"aboutMe" => "About Me",
			"photos" => "Photos",
			"portfolio" => "Portfolio",
			"contactMe" => "Contact Me",
			"imgMessage" => "images/message_en.png",
			"aboutAutor" => "<h4>About the author: <a class=\"LinkCursor\" href=\"http://www.linkedin.com/pub/carlos-dominguez/35/442/224\" title=\"Posts by Carlos Dominguez\">
						Carlos Dominguez</a></h4><p class=\"clear\">A software engineer living in San Jose, Costa Rica who spends most 
						of his time writing for his website and developing software. You can find him on Twitter 
						<a class=\"LinkCursor\" href=\"http://twitter.com/krlosnando\">twitter.com/krlosnando</a>.</p>
		            	<p class=\"clear\"><a href=\"\"></a></p>",
			"technicalSkills" => "Technical Skills", 
			"technicalSkillsParagraph" => "I have knowledge in OOP and I have worked with some Integrated development environments listed bellow:<br />
                                  Eclipse, Adobe Flash Builder 4, NetBeans, Zend Studio, Visual Studio 2008 and 2010.",
			"programmingLanguage" => "<LI id=\"personalList\"> - Programming language:
	                    <UL>  
	                        <li>Java ( one year of experience)</li>
	                        <li>.net ( C#, vb.net, aspx)</li>
	                        <li>ActionScript</li>
	                        <li>C++</li>
	                        <li>HTML</li>
	                        <li>CSS</li>
	                        <li>PHP</li>
	                        <li>JavaScript</li>
	                        <li>Ajax</li>
	                        <li>SQL Server 2005</li>
	                        <li>Microsoft Access</li>
	                        <li>Oracle 11g</li>
	                        <li>MySQL</li>
	                    </UL>
	                </LI>",
			"designPattern"  => "",
			"personalSkills"  => "<LI id=\"personalList\"> - Personal Skills  
	                    <UL>  
	                        <li>Social and organizational skills.</li>
	                        <li>Good communication skills and experience in teamwork.</li>
	                    </UL>  
	                </LI>",
			"readMore" => "Read More...",
			"miniProyecto1" => "Login for user and instructors.",
			"surveyManager" => "Survey Manager",
			"surveyManagerTitleLocal" => "Survey System Local App Manager",
			"surveyManagerTitleWeb" => "Survey System Web Manager",
			"myProjects" => "My Projects",
			"miniProyecto3" => "Fight Game with Design Patterns.",
			"desingPatterns" => "Design Patterns",
			"miniProyecto4" => "Using framework 3.5 of .net in C #, and SQL Database Server 2005.",
			"miniProyecto4Title" => "Administration of scholarships",
			"academicHistory" => "Academic History",
			"academicHistoryParagraph" => "Knowledge of a 50% english. I'm currently studying 
					Software Engineering in CENFOTEC. I have developed and participated in the following projects:",
			"summaryProyecto1" => "<a href=\"proyecto1cenfoclubes.php\">Project 1 in CENFOTEC</a> 4 months (group of five people), we developed a web 
					application using HTML, PHP and Access database for allocation advanced students to 
					different high schools in Costa Rica.",
			"summaryProyecto2" => "Project 2 in CENFOTEC 4 months (group of four people), we developed two management 
					applications and building surveys using the .NET framework and database SQL Server 2005. <br /> 
                       1) <a href=\"proyecto2ssl.php\">A local application in VB.Net. </a><br />
                       2) <a href=\"proyecto2ssw.php\">A website using aspx, JavaScript, Ajax and HTML.</a>",
			"goFacebook" => "Go to Facebook!",
			"goLinkedin" => "Go to Linkedin!",
			"goTwitter" => "Go to Twitter!",
			"seeAll" => "See All",
			"blackboardProject1" => "Cenfoclubes Project 1 CENFOTEC",
			"blackboardProject2Local" => "Survey System Local Project 2 CENFOTEC",
			"blackboardProject2Web" => "Survey System Web Project 2 CENFOTEC",
			"blackboardProject3" => "Fight Game with Design Patterns",
			"blackboardProject4" => "SIABE FONABE Administration of scholarships",
			"blogWindow8" => "Previewing 'Windows 8'",
			"blogMicrosoftStrategy" => "Microsoft Strategy",
			"blogMicrosoftSurfaceResume" => "Microsoft Surface is a revolutionary 
					multi-touch computer that responds to natural hand gestures 
					and real-world objects...",
			"blogMicrosoftSurfaceText" => "Microsoft Surface is a revolutionary 
					multi-touch computer that responds to natural hand gestures 
					and real-world objects, helping people interact with digital 
					content in a simple and intuitive way. With a large, horizontal 
					user interface, Surface offers a unique gathering place where 
					multiple users can collaboratively and simultaneously interact 
					with data and each other. Microsoft Surface is available now 
					for businesses in 18 countries and has a growing partner network 
					designing applications that will change the way you think about computing.<br /> <br />
					The entire product is 4 thin which includes the glass, PC and enclosure. 
					Forty-inch full high-definition (HD) 1080p screen. The 40-inch screen enables 
					unparalleled multi-user experiences in full HD 1080p, with a 16:9 aspect ratio 
					and 1920×1080 resolution. Designed for commercial environments. The product is 
					designed to meet the challenges of active usage in demanding locations such as retail, 
					hospitality and education. (Me: From the brochure about the product: There are standard 
					table legs available, or customers can design their own. The unit also is wall-mountable 
					and/or can be used as a horizontal or vertical kiosk.).<br /> <br />
					The price of this touch table is currently between $ 9 000 and $ 7 600 (EE.UU.).",
			"playvideo" => "Videos about the topic",
			"blogWindows8Resume" => "Microsoft has not yet made Windows 8 official, but there have been umpteen 
					leaks and rumors surrounding...",
			"blogwindows8Text" => "Microsoft has not yet made Windows 8 official, but there have been umpteen 
					leaks and rumors surrounding the next version of Windows 8 and it’s features. As with any 
					rumor, even this one needs to be taken with a grain of salt as Microsoft has a lot of 
					time to make changes before making Windows 8 public.<br /> <br />
					We are basically trying to reduce the clutter and list out the best Windows 8 features 
					expected by tech pundits.",
			"blogwindows8TextFaceDetection" => "Face detection or facial recognition has been around for a while, but never really 
					went mainstream till Microsoft Kinect for Xbox came in last year. Apparently, Windows 
					8 will come with facial recognition for logging in and will be able to switch user 
					profiles based on who is looking at the screen. How much personal a PC can get?.",
			"blogWindows8Support3D" => "3D support in Windows 8",
			"blogWindows8FaceDetection" => "Detecci&oacute;n de rostros",
			"blogMicrosoftStrategyText" => "Hay personas que siempre anda hablando cosas malas de Microsoft, Microsoft es una empresa que ha 
					dado muchos empleos a las personas y ha ayudado a salir adelante a pequeñas empresas, pero que frustrante oír cosas 
					como Microsoft se va a hundir, Windows Vista fue una cochinada, Microsoft no sirve para nada y cosas por el estilo.<br /><br />
					No es que yo sea súper fan de Microsoft, pero hay que reconocer el aporte que esta compañía ha dado al mundo de la 
					informática. Microsoft es el que va siempre a la cabeza de los Sistemas Operativos de escritorio. 
					El problema que Microsoft tuvo con Windows Vista fue uno y solo uno, y es que es un sistema operativo que 
					empezó a desarrollarse entre el 2000 y 2003. Esto, en el mundo de la informática, es un gran problema, 
					ya que hace siete u ocho años, Google prácticamente no era tan famoso como ahora, igual que muchos de los 
					competidores de Microsoft en aquella época, ya no existen. Nada más hay que pensar en que hace 12 años 
					estaban de moda los Pentium II, y un poco antes con los 8086. Microsoft aplicó un modelo con los recursos y el mercado 
					que presentaba en aquel entonces, cuyos cambios de mercado se producen a una velocidad impresionante, con el 
					gran problema de que cuando ya se había finalizado el sistema operativo de Windows vista, el mercado hab&iacute;a cambiado tanto, 
					que literalmente ya no servía para nada.<br /><br />
					Está claro que Windows Vista no fue un éxito y que mucha gente prefería usar Linux e incluso Mac OS, pero les aseguro 
					que Microsoft no va a decir: hemos perdido, y se va a retirar del juego. Supongo que tendrán un directivo lo suficiente 
					listo como para decir analicemos los errores y corrijámoslos, y en el 2008 o 2009 volvamos a ver un renovado sistema 
					operativo de Microsoft (Windows 7).<br /><br />
					Después de todo, hay que tener en cuenta que Microsoft no es sólo Windows. Microsoft es muchas cosas, incluyendo a su 
					estrellita la XBOX 360 Kinect, que está muy bien posicionada dentro de las consolas de nueva generación, la pantalla táctil 
					de <a href=\"blogmicrosoftsurface.php\">Microsoft Surface</a> ha sido un éxito, y hace poco saco su nuevo sistema operativo 
					<a href=\"blogwindows8.php\">Windows 8</a>. En ese sentido, Microsoft 
					aprendió muy bien de sus errores y que tenían que diversificar el mercado, y han sabido hacerlo.",
			"infoResume" => "<p>Resume</p>
		        	<a href=\"downloads/resume_carlos_dominguez.pdf\" target=\"_blank\">
		        		<img alt=\"Download Resume\" src=\"images/resume.png\"><br />
			        	<img alt=\"Download Resume\" src=\"images/resumedownload.png\">
		        	</a>",
			"selectLenguage" => "<img src=\"images/translate_es.png\">",
			"cenfoclubesTitle" => "Cenfoclubes Manager",
			"cenfoclubesResume" => "Project 1 in CENFOTEC 4 months (group of 5 persons), we developed a web application 
					using HTML, PHP and Access database...",
			"cenfoclubesParagraph"  => "Project 1 in CENFOTEC 4 months (group of 5 persons), we developed a web application using HTML, PHP and 
					Access database for allocation advanced students to different schools in Costa Rica.",
			"surveySystemLocalTitle" => "Survey System Local App Manager",
			"surveySystemLocalResume" => "We developed a surveys management applications using the 
					.NET framework with VB.NET and database SQL Server 2005...",
			"surveySystemLocalParagraph" => "Project 2 in CENFOTEC 4 months (group of four people), we developed two 
					management applications and building surveys using the .NET framework and database SQL Server 2005.
					<br />o A local application in VB.NET
					<br />o <a class=\"LinkCursor\"  href=\"proyecto2ssw.php\" >A website using ASPX.NET, JavaScript, Ajax and HTML</a>",
			"surveySystemWebTitle" => "Survey System Web Manager",
			"surveySystemWebResume" => "Project 2 in CENFOTEC 4 months (group of 4 persons); we developed a website using aspx, 
					JavaScript, Ajax and HTML...",
			"surveySystemWebParagraph" => "Project 2 in CENFOTEC 4 months (group of four people), we developed two 
					management applications and building surveys using the .NET framework and database SQL Server 2005.
					<br /> o <a class=\"LinkCursor\"  href=\"proyecto2ssl.php\" >A local application in VB.NET</a>
					<br /> o A website using ASPX.NET, JavaScript, Ajax and HTML",
			"fightGameTitle" => "Fight Game with Design Patterns",
			"fightGameResume" => "This game I did with another partner in ActionScript 3 for a project of Design Patterns ...",
			"fightGameParagraph" => "This game I did with another partner in ActionScript 3.0 for a project of Design Patterns. In the project we developed the 
				framework 'Beu2' in ActionScript 3.0, with the help of design patterns to create a family of applications, and allow other 
				programmers based on the framework and develop different games.",
			"siabeFonabeTitle" => "SIABE Administration of scholarships",
			"siabeFonabeResume" => "I developed a local application in FONABE for fingering department, using framework 3.5 of .net in 
                	C #, and SQL Database Server 2005...",
			"siabeFonabeParagraph" => "I developed a local application in FONABE for fingering department, using framework 3.5 
					of .net in C #, and SQL Database Server 2005.",
			"contactMeTitle" => "Contact Carlos Dominguez",
			"contactMeParagraph" => "If you have any questions, comments or just feel like dropping me a line, 
				fill in the form below and send me an email. I&#8217;ll do my best to respond 
				as soon as possible though sometimes it might take a bit longer than usual.",
			"contactMeYourName" => "Your name:",
			"contactMeYourEmail" => "Your email:",
			"contactMeYourMessage" => "Your message:",
		),
		 	
		//Spanish text
		"es" => array (
			"wordSend" => "Enviar",
			"wordRequired" => "requerido",
			"wordArticle" => "Articulo",
			"wordProject" => "Proyecto",
			"wordProjectImages" => "Imagenes del proyecto",
			"wordDownloadProject" => "Descargar todo el proyecto",
			"wordPlayGame" => "Jugar mi juego",
			"wordComment" => "comentarios",
			"wordBy" => "por",
			"titleHeaderPage" => "Ingeniero de Software",
			"waitLoadGame" => "El juego comenzara en pocos segundos...",
			"localeFacebook" => "es_ES",
			"cdominguez" => "Sitio Web de Carlos Dominguez",
		 	"title" => "Portafolio de Carlos",
			"visit" => " Visitas.",
			"home" => "Inicio",
			"aboutMe" => "Sobre Mi",
			"photos" => "Fotos",
			"portfolio" => "Portafolio",
			"contactMe" => "Contactarme",
			"imgMessage" => "images/message_es.png",
			"aboutAutor" => "<h4>Sobre el autor: <a class=\"LinkCursor\" href=\"http://www.linkedin.com/pub/carlos-dominguez/35/442/224\" title=\"Posteado por Carlos Dominguez\">
						 Carlos Dominguez</a></h4><p class=\"clear\">Soy un Ingeniero en Desarrollo de Software, vivo en Costa Rica y gasto bastante de mi tiempo escribiendo 
						 para mi sitio web y desarrollando todo tipo de software. Tambien puedes encontrarme en Twitter 
						 <a class=\"LinkCursor\" href=\"http://twitter.com/krlosnando\">twitter.com/krlosnando</a>.</p>
		            	 <p class=\"clear\"><a href=\"\"></a></p>",
			"technicalSkills" => "Habilidades t&eacute;cnicas", 
			"technicalSkillsParagraph" => "Tengo conocimientos en programaci&oacute;n orientada a objetos y programaci&oacute;n estructurada, 
						manejo perfectamente el proceso que se necesita para el desarrollo de un software como lo son la parte de requerimientos, 
						an&aacute;lisis, desarrollo y pruebas, aplicando la documentaci&oacute;n apropiada del software en UML. Tambien poseeo experiencia 
						trabajando en equipo, y dirigiendolo para finalizar un proyecto. Tengo experiencia trabajando con los 
						siguientes entornos de desarrollo: Eclipse, Adobe Flash Builder 4, NetBeans, Zend Studio, Visual Studio 2008 y 2010.",
			"programmingLanguage" => "<br /><LI id=\"personalList\"> - Tengo conocimiento en los siguientes lenguajes de programaci&oacute;n:
	                    <UL>  
	                        <li>Java ( M&aacute;s de un a&ntilde;o de experiencia )</li>
	                        <li>.net: C#, vb.net y aspx ( M&aacute;s de un a&ntilde;o de experiencia )</li>
	                        <li>ActionScript</li>
	                        <li>C++</li>
	                        <li>HTML</li>
	                        <li>CSS</li>
	                        <li>PHP</li>
	                        <li>JavaScript</li>
	                        <li>Ajax</li>
	                    </UL>  
	                </LI><br />
	                <LI id=\"personalList\"> - Base de datos:
	                    <UL>  
	                        <li>SQL Server 2005</li>
	                        <li>Microsoft Access</li>
	                        <li>Oracle 11g</li>
	                        <li>MySQL</li>
	                    </UL>  
	                </LI><br />",
			"designPattern"  => "<LI id=\"personalList\"> - Se utilizar los siguientes patrones de dise&ntilde;o:
	                    <UL><br /> 1) - Patrones Creacionales:
	                        <li>F&aacute;brica Abstracta (Abstract Factory)</li>
	                        <li>M&eacute;todo F&aacute;brica (Factory Method)</li>
	                        <li>Constructor (Builder)</li>
	                        <li>Prototipo (prototype)</li>
	                        <li>Singleton</li>
	                    </UL>  
	                    <UL><br /> 2) - Patrones Estructurales:
	                        <li>Fachada (Facade)</li>
	                        <li>Adaptador (Wrapper)</li>
	                        <li>Constructor (Builder)</li>
	                        <li>Puente (Bridge)</li>
	                        <li>Compuesto (Composite)</li>
	                        <li>Decorador (Decorator)</li>
	                        <li>Peso ligero (FlyWeight)</li>
	                    </UL>  
	                    <UL><br /> 3) - Patrones de Conducta:
	                        <li>Iterador (Iterator)</li>
	                        <li>Memento</li>
	                        <li>Estado (State)</li>
	                        <li>Estrategia (strategy)</li>
	                        <li>Observador (Observer)</li>
	                        <li>Cadena de Responsabilidad (chain of responsibility)</li>
	                        <li>Comando (command)</li>
	                        <li>Visitante (Visitor)</li>
	                    </UL>  
	                </LI>",
	     	"personalSkills"  => "<br /><LI id=\"personalList\"> - Habilidades personales 
	                    <UL>
	                    	<li>No me intimida la complejidad ni la dificultad de aprender algo nuevo</li>
	                    	<li>Seguro de mi trabajo</li>  
	                        <li>Me gusta socializar y conocer personas</li>
	                        <li>Organizado y responsable</li>
	                        <li>Buena comunicaci&oacute;n</li>
	                        <li>Experiencia en trabajo en equipo</li>
	                    </UL>  
	                </LI>",
			"readMore" => "Leer m&aacute;s...",
			"miniProyecto1" => "Inicio de sesi&oacute;n para usuarios y instructores.",
			"surveyManager" => "Administrador de encuestas.",
			"surveyManagerTitleLocal" => "Aplicaci&oacute;n administrativa Survey System Local",
			"surveyManagerTitleWeb" => "Aplicaci&oacute;n Web Survey System",
			"myProjects" => "Mis Proyectos",
			"miniProyecto3" => "Juego de pelea con Patrones de Dise&ntilde;o.",
			"desingPatterns" => "Patrones de Dise&ntilde;o",
			"miniProyecto4" => "Use el Framework 3.5 de .Net en C# y la base de datos de SQL Server 2005.",
			"miniProyecto4Title" => "Aplicaci&oacute;n para la administraci&oacute;n de becados en Costa Rica.",
			"academicHistory" => "Historial Acad&eacute;mico",
			"academicHistoryParagraph" => "Hablo un 60% de ingles. Actualmente estoy terminando el diplomado de 
					Ingenieria en Desarrollo de Software en CENFOTEC y he desarrollado los siguientes proyectos:",
			"summaryProyecto1" => "<a href=\"proyecto1cenfoclubes.php\">Proyecto 1 en CENFOTEC</a>, 4 meses (grupo de 5 personas), nosotros desarrollamos 
					una aplicaci&oacute;n web usando HTML, PHP y la base de datos Microsoft Access, est&aacute; 
					aplicaci&oacute;n permitia la administraci&oacute;n de los instructures (estudiantes 
					avanzados de CENFOTEC) y asignarlos a los diferentes colegios en Costa Rica.",
			"summaryProyecto2" => "Proyect 2 en CENFOTEC, 4 meses (grupo de 4 personas), nosotros desarrollamos dos 
					aplicaciones para la administraci&oacute;n y confecci&oacute;n de encuestas, utilizamos el framewor 3.5 
					de .NET, la base de datos de SQL Server 2005 y Crystal Report. <br /> 
                       1) <a href=\"proyecto2ssl.php\">Una aplicaci&oacute;n local en VB.Net. </a><br />
                       2) <a href=\"proyecto2ssw.php\">Una aplicaci&oacute;n Web usando aspx, JavaScript, Ajax y HTML.</a>",
			"goFacebook" => "¡Ir a mi Facebook!",
			"goLinkedin" => "¡Ir a mi Linkedin!",
			"goTwitter" => "¡Ir a mi Twitter!",
			"seeAll" => "Ver Todos",
			"blackboardProject1" => "Administrador de instructores",
			"blackboardProject2Local" => "Aplicaci&oacute;n de encuestas local",
			"blackboardProject2Web" => "Aplicaci&oacute;n web de encuestas",
			"blackboardProject3" => "Juego de Peleas con Patrones de Dise&ntilde;o",
			"blackboardProject4" => "Administrador de becados para FONABE",
			"blogWindow8" => "Prevista a 'Windows 8'",
			"blogMicrosoftStrategy" => "Estrategia de Microsoft",
			"blogMicrosoftSurfaceResume" => "Microsoft Surface es un revolucionario equipo multi-touch que responde a los 
					gestos de la mano naturalmente y los objetos del mundo real, ayudando a los usuarios a interactuar con el 
					contenido digital de forma sencilla...",
			"blogMicrosoftSurfaceText" => "Microsoft Surface es un revolucionario equipo multi-touch que responde a los 
					gestos de la mano naturalmente y los objetos del mundo real, ayudando a los usuarios a interactuar con el 
					contenido digital de forma sencilla e intuitiva. Con una gran interfaz horizontal, 
					Microsft Surface ofrece un lugar de reunión único en el que varios usuarios pueden colaborar y 
					al mismo tiempo interactuar con datos y con los demás. Microsoft Surface ya está disponible 
					para las empresas en 18 países..<br /> <br />
					El producto completo es delgado, incluye el vidrio, PC y anexo. 40 pulgadas de alta definición (HD) de 1080p de pantalla. 
					La pantalla de 40 pulgadas permite a múltiples usuarios interactuar con la pantalla en Full HD 1080p, con una relación 
					de aspecto 16:9 y resolución de 1920 × 1080. Diseñado para entornos comerciales. El producto está diseñado para afrontar 
					los retos del uso de activos en lugares exigentes, tales como tiendas, hostelería y educación. <br /> <br />
					El precio de este producto est&aacute; actualmente entre los $ 9 000 y $ 7 600 dolares (EE.UU.).",
			"playvideo" => "Videos sobre el tema",
			"blogwindows8Text" => "Microsoft a&uacute;n no ha hecho oficial Windows 8, pero hay muchos rumores del pr&oacute;ximo sistema operativo 
					Windows 8 y sus caracter&iacute;sticas. Al igual que cualquier rumor, puede que todo lo que digan algunos sea mentira ya que 
					Microsoft tiene un mont&oacute;n de tiempo para hacer cambios antes de p&uacute;blicar Windows 8.<br /><br />
					B&aacute;sicamente, solo describir&eacute; algunas de las mejores caracter&iacute;sticas de Windows 8 que encontre  
					buscando en diferentes sitios de cofianza.",
			"blogwindows8TextFaceDetection" => "Detección de rostros o el reconocimiento facial ha existido por un tiempo, pero en realidad nunca fue 
					dominante hasta que el Xbox Kinect de Microsoft se produjo el año pasado. Al parecer, Windows 8 vendrá con el reconocimiento 
					facial y será capaz de cambiar de perfil de usuario según él que está mirando la pantalla. 
					¿Cuánto más personal va a ser la PC?.",
			"blogWindows8Resume" => "Microsoft a&uacute;n no ha hecho oficial Windows 8, pero hay muchos rumores del pr&oacute;ximo sistema operativo 
					Windows 8 y sus caracter&iacute;sticas...",
			"blogWindows8Support3D" => "Soporte 3D en Windows 8",
			"blogWindows8FaceDetection" => "Detecci&oacute;n de rostros",
			"blogMicrosoftStrategyText" => "Hay personas que siempre anda hablando cosas malas de Microsoft, Microsoft es una empresa que ha 
					dado muchos empleos a las personas y ha ayudado a salir adelante a pequeñas empresas, pero que frustrante oír cosas 
					como Microsoft se va a hundir, Windows Vista fue una cochinada, Microsoft no sirve para nada y cosas por el estilo.<br /><br />
					No es que yo sea súper fan de Microsoft, pero hay que reconocer el aporte que esta compañía ha dado al mundo de la 
					informática. Microsoft es el que va siempre a la cabeza de los Sistemas Operativos de escritorio. 
					El problema que Microsoft tuvo con Windows Vista fue uno y solo uno, y es que es un sistema operativo que 
					empezó a desarrollarse entre el 2000 y 2003. Esto, en el mundo de la informática, es un gran problema, 
					ya que hace siete u ocho años, Google prácticamente no era tan famoso como ahora, igual que muchos de los 
					competidores de Microsoft en aquella época, ya no existen. Nada más hay que pensar en que hace 12 años 
					estaban de moda los Pentium II, y un poco antes con los 8086. Microsoft aplicó un modelo con los recursos y el mercado 
					que presentaba en aquel entonces, cuyos cambios de mercado se producen a una velocidad impresionante, con el 
					gran problema de que cuando ya se había finalizado el sistema operativo de Windows vista, el mercado hab&iacute;a cambiado tanto, 
					que literalmente ya no servía para nada.<br /><br />
					Está claro que Windows Vista no fue un éxito y que mucha gente prefería usar Linux e incluso Mac OS, pero les aseguro 
					que Microsoft no va a decir: hemos perdido, y se va a retirar del juego. Supongo que tendrán un directivo lo suficiente 
					listo como para decir analicemos los errores y corrijámoslos, y en el 2008 o 2009 volvamos a ver un renovado sistema 
					operativo de Microsoft (Windows 7).<br /><br />
					Después de todo, hay que tener en cuenta que Microsoft no es sólo Windows. Microsoft es muchas cosas, incluyendo a su 
					estrellita la XBOX 360 Kinect, que está muy bien posicionada dentro de las consolas de nueva generación, la pantalla táctil 
					de <a href=\"blogmicrosoftsurface.php\">Microsoft Surface</a> ha sido un éxito, y hace poco saco su nuevo sistema operativo 
					<a href=\"blogwindows8.php\">Windows 8</a>. En ese sentido, Microsoft 
					aprendió muy bien de sus errores y que tenían que diversificar el mercado, y han sabido hacerlo.",
			"infoResume" => "<p>Curriculum</p>
		        	<a href=\"downloads/curriculum_carlos_dominguez.pdf\" target=\"_blank\">
		        		<img alt=\"Descargar Curriculum\" src=\"images/resume.png\" /><br />
			        	<img alt=\"Descargar Curriculum\" src=\"images/resumedownload.png\" />
		        	</a>",
			"selectLenguage" => "<img src=\"images/translate_en.png\">",
			"cenfoclubesTitle" => "Administrador de instructores en Cenfoclubes",
			"cenfoclubesResume" => "Proyecto 1 en CENFOTEC, 4 meses (grupo de 5 personas), nosotros 
					desarrollamos una aplicación web usando HTML, PHP y la base de datos Microsoft Access...",
			"cenfoclubesParagraph"  => "Proyecto 1 en CENFOTEC, 4 meses (grupo de 5 personas), nosotros desarrollamos una 
					aplicaci&oacute;n web usando HTML, PHP y la base de datos Microsoft Access, est&aacute; aplicaci&oacute;n 
					permit&iacute;a la administraci&oacute;n de los instructores (estudiantes avanzados de CENFOTEC) y 
					asignarlos a los diferentes colegios en Costa Rica.",
			"surveySystemLocalTitle" => "Survey System Aplicaci&oacute;n Local",
			"surveySystemLocalResume" => "Nosotros desarrollamos una aplicaci&oacute;n para la administraci&oacute;n de encuestas, utilizando
					el Framework de .NET, el lenguaje VB.NET y la base de datos de SQL Server 2005...",
			"surveySystemLocalParagraph" => "Proyecto 2 en CENFOTEC, 4 meses (grupo de 4 personas), nosotros 
					desarrollamos dos aplicaciones para la administración y confección de encuestas, 
					utilizamos el Framework 3.5 de .NET, la base de datos de SQL Server 2005 y Crystal Report.
					<br /> o Una aplicación local en VB.NET
					<br /> o <a class=\"LinkCursor\"  href=\"proyecto2ssw.php\" >Una aplicación Web usando ASPX.NET, JavaScript, Ajax y HTML</a>",
			"surveySystemWebTitle" => "Survey System Aplicaci&oacute;n Web",
			"surveySystemWebResume" => "Proyecto 2 en Cenfotec, 4 meses (grupo de 4 personas). Nosotros desarrollamos un sitio web usando aspx.net, 
					JavaScript, Ajax y HTML...",
			"surveySystemWebParagraph" => "Proyecto 2 en CENFOTEC, 4 meses (grupo de 4 personas), nosotros 
					desarrollamos dos aplicaciones para la administraci&oacute;n y confecci&oacute;n de encuestas, 
					utilizamos el Framework 3.5 de .NET, la base de datos de SQL Server 2005 y Crystal Report.
					<br /> o <a class=\"LinkCursor\"  href=\"proyecto2ssl.php\" >Una aplicaci&oacute;n local en VB.NET</a>
					<br /> o Una aplicaci&oacute;n Web usando ASPX.NET, JavaScript, Ajax y HTML.",
			"fightGameTitle" => "Juego de aventura con patrones de dise&ntilde;o",
			"fightGameResume" => "Este juego lo desarrolle junto con un compa&ntilde;ero aplicando los patrones de dise&ntilde;o...",
			"fightGameParagraph" => "Este juego lo hice con otro compa&ntilde;ero en ActionScript 3.0 para un proyecto de Patrones de Dise&ntilde;o. 
				En el proyecto nosotros desarrollamos el Framework 'Beu2' aplicando los diferentes tipos de patrones para crear una familia de aplicaciones, y permitir
				a otros probramadores basarse en este Framework y poder desarrollar diferentes tipos de juegos con la misma logica.",
			"siabeFonabeTitle" => "Aplicaci&oacute;n para la administraci&oacute;n de becados SIABE",
			"siabeFonabeResume" => "Desarrolle una aplicaci&oacute;n en FONABE para el departamento de Digitaci&oacute;n, 
					utilize el Framework 3.5 de .NET en C #, y la base de datos de SQL Server 2005...",
			"siabeFonabeParagraph" => "Desarrolle una aplicación local para el área de digitación en FONABE, usando el
					Framework 3.5 de .net en C#, y la base de datos de SQL Server 2005.",
			"contactMeTitle" => "Contactar a Carlos Dominguez",
			"contactMeParagraph" => "Si usted tiene alguna pregunta, comentario o solamente desea dejarme mensaje personal,
				llene el formulario de abajo, y me enviara un mensaje a mi correo electronico. Yo har&eacute; todo lo posible
				para responder tan pronto como sea posible, aunque a veces puedo tardar un poco m&aacute;s de lo normal.",
			"contactMeYourName" => "Tu nombre:",
			"contactMeYourEmail" => "Tu correo:",
			"contactMeYourMessage" => "Tu mensaje:"
			
		));
		
	function LocalisedTextBaseDemo($config)
	{
		$this->config = $config;
	}
	
	
	function setLocalisedText($language, $textKey, $textValue, $blnUpdateTime)
	{			
		//not supported
	}
	
	function addText($language, $key, $text)
	{
		//not supported
	}
	
	
	function getLocalisedText($textKey, $language)
	{
		$table = $this->textBase[$language];
		
		//this text does not exist
		if (!$table[$textKey])
			return false;
		
		return $table[$textKey];
	}	
	
	function getUpdateTime($textKey, $language)
	{
		//not supported
	}
	
	function getKeyList($language, $sort = "date")
	{		
		$table = $this->textBase["en"];
		
		//create the key array
		$keys = array();
		while (list ($key, $val) = each ($table))
		{
			array_push($keys, $key);
		}				
		return $keys;
	}
	
	function getWordCount($key, $language)
	{
		//assumes that the mean word length is 5 characters long
		$table = $this->textBase[$language];			
		return (int) (strlen($table[$key])/5);
	}
	
	function getLastUpdate($key, $language)
	{
		//not supported
	}
	
	function deleteText($key, $language)
	{
		//not supported
	}
}
?>