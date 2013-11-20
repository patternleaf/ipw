<?php 
include('content/sessions/common.php');
app()->setFragment('HTMLTitle', 'Intro to Web Programming: Session 3');
app()->setFragment('HTMLBodyAttributes', 'data-spy="scroll" data-offset="100" data-target="#sidebar-nav"');
ob_start();
?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Session 3</h1>
			<p class="lead"></p>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="span3 session-sidebar">
				<ul class="nav nav-tabs nav-stacked" id="sidebar-nav">
				</ul>
			</div>
			<div class="span9 session-content">
				<section id="intro" class="first">
					<blockquote class="pull-right first">
						<p>A Pithy Quote.</p>
						<small>
							From Someone
						</small>
					</blockquote>
					<p style="clear:both;">
						Some introductory text.
					</p>
				</section>
				<section id="php" style="clear:both;">
					<h1>PHP: Hypertext Preprocessor</h1>
					<p>
						PHP is a language developed specifically to allow the creation of dynamic web sites. Originally, the acronym was an abbreviation of <em>Personal Home Page</em>; later it became the recursive <em>PHP: Hypertext Preprocessor</em>.
					</p>
					<h2>What's a Preprocessor?</h2>
					<p>
						A <dfn>preproccessor</dfn> is a module that transforms the text of a file before it is passed on to the "main" module or processor. 
					</p>
					<p>
						Bit of an aside, here&hellip; The C language has a preprocessor. It's used to make code more readable, compact, and manageable. For example, 
					</p>
					<div class="row live-example">
						<div class="code-container" style="height:300px; width:100%;">
							<div id="example-1" data-language="c_cpp" class="pretty-code non-editable" style="height:300px; width:100%;">/*
* Calculate radians from degrees.
*/
#include "stdio.h"
#define PI 3.14159265359
int main() {
	char num[128];
	float degrees, radians;
	printf("Enter degrees:\n");
	scanf("%f", &amp;degrees);
	radians = (degrees * PI / 180);
	printf("%f degrees is equal to %f radians.\n", degrees, radians);
	return 0;
}</div>
						</div>
					</div>
					<p>
						In this short program, there are two uses of the preprocessor: in <a href="#" class="line-highlighter" data-target="example-1" data-line="4">line 4</a>, <code>#include "stdio.h"</code> tells the preprocessor to include <dfn>inline</dfn>&mdash;that is, copy and paste right <em>here</em> into the file&mdash;the contents of the file <code>stdio.h</code>. Stdio.h gives the program access to functions for getting input from the user and printing output. Stdio.h in turn includes other files, each of which may include other files&hellip; By the time everything has been copied in in this way, our 11-line program has blossomed into a 400-plus-line program. The preprocessor let us write 1 line of code instead of copying and pasting all of that. Yay!
					</p>
					<p>
						Next, in <a href="#" class="line-highlighter" data-target="example-1" data-line="5">line 5</a>, <code>#define PI 3.14159265359</code>, creates a <em>macro</em>. This tells the preprocessor that anywhere it sees the token <code>PI</code>, it should replace that with the token <code>3.14159265359</code>. Now, anywhere in the program where we want to use the number pi, accurate to 11 decimal places, we can write <code>PI</code>, and the preprocessor will replace every instance of it with <code>3.14159265359</code>. This keeps us from having to remember what the first 11 digits of pi is every time we want to use it.
					</p>
					<p>
						The preprocessor also strips out the <dfn>comments</dfn> at the top of the file, which are written for human readers but have no meaning to the computer.
					<p>
						So, after the C preprocessor is done with our program, it looks like this:
					</p>
					<div class="row live-example">
						<div class="code-container" style="height:300px; width:100%;">
							<div id="example-2" data-language="c_cpp" class="pretty-code non-editable" style="height:300px; width:100%;">typedef signed char __int8_t;
typedef unsigned char __uint8_t;
typedef short __int16_t;
typedef unsigned short __uint16_t;
typedef int __int32_t;

//
// 400+ lines of definitions ...
//

int main() {
 char num[128];
 float degrees, radians;
 printf("Enter degrees:\n");
 scanf("%f", &amp;degrees);
 radians = (degrees * 3.14159265359 / 180);
 printf("%f degrees is equal to %f radians.\n", degrees, radians);
 return 0;
}
</div>
						</div>
					</div>
					<p>
						As you can see in <a href="#" class="line-highlighter" data-target="example-2" data-line="16">line 16</a>, where we had written <code>PI</code>in the original code, the preprocessor replaced it <em>inline</em> with <code>3.14159265359</code>.
					</p>
					<p>
						This big file, rather than our small 11-line file, is what is actually sent to the C <dfn>compiler</dfn>, which is a program that creates programs.
					</p>
					<figure id="c-compilation-flow" class="data-flow-diagram">
						<ol>
							<li><i class="icon-file icon-white"></i>C program</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li><i class="icon-cog icon-white"></i>preprocessor</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li><i class="icon-file icon-white"></i>processed C file</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li><i class="icon-cog icon-white"></i>compiler</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li><i class="icon-ok-sign icon-white"></i>program we can run</li>
						</ol>
					</figure>
					<p>
						C is a relatively <dfn>low-level language</dfn>. This means that it doesn't provide a lot of developer-friendly abstractions that make it easy to write programs. The C preprocessor is simple, but a relative luxury. Without it, writing programs in C could be tedious and error-prone. Well, that is to say&hellip; <em>more</em> tedious and error-prone than it already is. 
					</p>
					<h2>Hypertext Preprocessor</h2>
					<p>
						So PHP is also a preprocessor, but whereas the C preprocessor is only a part of the C language, PHP is an entire language on its own. Still, the operation is similar to the C preprocessor. It takes what would be a normal HTML file, goes through it and replaces parts of it with the output of PHP commands.
					</p>
					<p>
						So in a file like this:
					</p>
					<div class="row live-example">
						<div class="code-container" style="height:300px; width:100%;">
							<div id="example-3" data-language="php" class="pretty-code non-editable" style="height:300px; width:100%;"><?php 
$f = file_get_contents(__DIR__.'/php-example-1.php');
echo htmlentities($f); ?></div>
						</div>
					</div>
					<p>
						PHP will go through and look for all instances of PHP's <em>processing instruction blocks</em>, <code>&lt;?php ... ?></code> and replace those blocks <em>inline</em> with the output of the commands inside them. The result is then passed on to your web server to be sent out over the network. Whereas the normal serving process for HTML files is:
					</p>
					<figure id="html-flow" class="data-flow-diagram">
						<ol>
							<li><i class="icon-file icon-white"></i>HTML file</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li><i class="icon-cog icon-white"></i>web server</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li><i class="icon-upload icon-white"></i>sent to internet</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li><i class="icon-download icon-white"></i>downloaded into browser</li>
						</ol>
					</figure>
					<p>
						When PHP is used, the flow looks like:
					</p>
					<figure id="html-flow" class="data-flow-diagram">
						<ol>
							<li><i class="icon-file icon-white"></i>PHP file</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li class="highlight"><i class="icon-cog icon-white"></i>PHP interpreter</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li><i class="icon-cog icon-white"></i>web server</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li><i class="icon-upload icon-white"></i>sent to internet</li>
							<li class="pipe"><i class="icon-arrow-right"></i></li>
							<li><i class="icon-download icon-white"></i>downloaded into browser</li>
						</ol>
					</figure>
					<p>
						The post-PHP-processed HTML of the above example is:
					</p>
					<div class="row live-example">
						<div class="code-container" style="height:300px; width:100%;">
							<div id="example-4" data-language="php" class="pretty-code non-editable" style="height:300px; width:100%;"><?php
$f = file_get_contents(__DIR__.'/php-example-1.php'); 
ob_start();
eval('?>'.$f);
echo htmlentities(ob_get_clean()); ?></div>
						</div>
					</div>
					<p>
						The <code>&lt;?php</code> processing instruction is gone, replaced by the result of its PHP contents (in this case, just a command to <code>echo</code>, or print, some text). This is what the browser sees and renders.
					</p>
					<p>
						You can see this very file processed and rendered for your enjoyment <a href="<?php app()->contentWD();?>php-example-1.php">here</a>.
					</p>
				</section>
				
				<section id="php-program" style="clear:both;">
					<h1>A PHP Program</h1>
					<p>
						Let's write a PHP program. Make a new file in the document root of your web server for this course called "exercise-1.php". Copy the following code into it.
					</p>
					<div class="row live-example">
						<div class="span9">
							<div class="code-container" style="height:200px; width:100%;">
								<div id="example-5" data-language="php" class="pretty-code" style="height:200px; width:100%;"><?php
$f = file_get_contents(__DIR__.'/exercise-1/step-1.php'); 
echo htmlentities($f); ?></div>
							</div>
						</div>
					</div>
					<p>
						Make sure you can have the file served via your web server and loaded into your browser.
					</p>
					<h2>Reading a PHP.net Reference Page</h2>
					<p>
						Now, this file is not yet dynamic. Also it will not be accurate on any day ever except for on Mondays, February the 4ths. Let's fix that. PHP has a built-in function called <code>date</code> which will return the current date in various formats. The function takes as argument a string which determines the format. You can find <a href="http://php.net/date">the full reference for this function at php.net</a>.
					</p>
					<p>
						You'll notice the <dfn>function signature</dfn> for <code>date</code> is listed at the top of the reference page:
					</p>
					<figure>
						<blockquote><pre><span style="color:#3388ff">string</span> date ( <span style="color:orange;">string $format</span> <span style="color:#55bb44">[, int $timestamp = time() ]</span> )</code></pre></blockquote>
					</figure>
					<p>
						This signature shows that <code>date</code> takes as argument: (1) <span style="color:orange">a string</span> and (2) <span style="color:#55bb44">optionally (the square brackets indicate that an argument is optional) an <code>int</code> (short for integer) timestamp</span>. The signature further shows that <code>date</code> <span style="color:#3388ff">returns a string</span>.
					</p>
					<p>
						Below the function signature and a short description is an explanation of the parameters, including how the format string is used to determine what date returns. Then below that are a few other things, and then some examples. This is often a good first place to go to see how functions are used.
					</p>
					<p>
						From Example #4, pick a format string that is shown to result in something close to what you want: "Monday, February 4". You can use the following template, which already has the <code>&lt;?php</code> processing instructions in place, and the language construct <code>echo</code>, which will
					</p>
					<div class="row live-example">
						<div class="span9">
							<div class="code-container" style="height:200px; width:100%;">
								<div id="example-5" data-language="php" class="pretty-code" style="height:200px; width:100%;"><?php
$f = file_get_contents(__DIR__.'/exercise-1/step-2.php'); 
echo htmlentities($f); ?></div>
							</div>
						</div>
					</div>
					
				</section>
			</div>
		</div>
	</div>
<?php 
app()->setFragment('HTMLBodyContent', ob_get_clean()); 

appendSessionBodyTail();
