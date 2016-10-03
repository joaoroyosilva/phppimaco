<?php
namespace PhpPimacoTest;

use Proner\PhpPimaco\P;
use Proner\PhpPimaco\Tag;

class TagTest extends \PHPUnit_Framework_TestCase
{
    function test_border()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/tests/templates/";

        $tag = new Tag('teste');
        $tag->loadConfig($template, $path);

        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span style='margin: 0mm;padding: 0mm;'>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());

        $tag->setBorder(0.1);
        $render = "<div style='width: 10mm;height: 10mm;border: 0.1mm solid black;'><div style='padding: 0mm;'><span style='margin: 0mm;padding: 0mm;'>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }

    function test_padding()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/tests/templates/";

        $tag = new Tag('teste');
        $tag->loadConfig($template, $path);

        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span style='margin: 0mm;padding: 0mm;'>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());

        $tag->setPadding(4);
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 4mm;'><span style='margin: 0mm;padding: 0mm;'>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }

    function test_render()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/tests/templates/";

        $tag = new Tag('teste');
        $tag->loadConfig($template, $path);

        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span style='margin: 0mm;padding: 0mm;'>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }

    function test_render_with_p()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/tests/templates/";

        $tag = new Tag();
        $tag->loadConfig($template, $path);

        $tag->p('teste');
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span style='margin: 0mm;padding: 0mm;'>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());

        $tag->p('teste2');
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span style='margin: 0mm;padding: 0mm;'>teste</span><span style='margin: 0mm;padding: 0mm;'>teste2</span></div></div>";
        $this->assertEquals($render,$tag->render());

        $tag->p('teste3')->b();
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span style='margin: 0mm;padding: 0mm;'>teste</span><span style='margin: 0mm;padding: 0mm;'>teste2</span><span style='margin: 0mm;padding: 0mm;font-weight: bold;'>teste3</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }

    function test_render_add_p()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/tests/templates/";

        $tag = new Tag();
        $tag->loadConfig($template, $path);

        $p = new P('teste');
        $tag->addP($p);
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span style='margin: 0mm;padding: 0mm;'>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());

        $p = new P('teste3');
        $tag->addP($p)->b();
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span style='margin: 0mm;padding: 0mm;'>teste</span><span style='margin: 0mm;padding: 0mm;font-weight: bold;'>teste3</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }
}