<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* post/show.index.twig */
class __TwigTemplate_21419d724aa77f2176785ff4769222388e3520145c48820a583a2a276a7b20b3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "baseFrontOffice.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/show.index.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/show.index.twig"));

        $this->parent = $this->loadTemplate("baseFrontOffice.html.twig", "post/show.index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "
    <div class=\"container my-4 py-4 bg-white\">
        <div>
            <div class=\"d-flex text-center justify-content-between position-relative\">
                <h3 class=\"mb-0\">";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 9, $this->source); })()), "title", [], "any", false, false, false, 9), "html", null, true);
        echo "</h3>
            ";
        // line 10
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 10), "roles", [], "any", true, true, false, 10) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 10, $this->source); })()), "user", [], "any", false, false, false, 10), "roles", [], "any", false, false, false, 10)))) {
            // line 11
            echo "                ";
            if (twig_in_filter("admin", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 11, $this->source); })()), "user", [], "any", false, false, false, 11), "roles", [], "any", false, false, false, 11))) {
                // line 12
                echo "                    <span onclick=\"clickEdit('post', ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
                echo ", event)\" class=\"post-edit-info d-block text-secondary\">...</span>
                    <div class=\"edit-menu edit-menu_";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13), "html", null, true);
                echo " d-none\"></div>
                ";
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 14
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "user", [], "any", false, false, false, 14), "id", [], "any", false, false, false, 14) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 14, $this->source); })()), "user", [], "any", false, false, false, 14), "id", [], "any", false, false, false, 14))) {
                // line 15
                echo "                    <span onclick=\"clickEdit('post', ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 15, $this->source); })()), "id", [], "any", false, false, false, 15), "html", null, true);
                echo ", event)\" class=\"post-edit-info d-block text-secondary\">...</span>
                    <div class=\"edit-menu edit-menu_";
                // line 16
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 16, $this->source); })()), "id", [], "any", false, false, false, 16), "html", null, true);
                echo " d-none\"></div>
                ";
            } else {
                // line 18
                echo "                ";
            }
            // line 19
            echo "            ";
        }
        // line 20
        echo "            </div>
            <em class=\"d-block mb-2 text-secondary\">
                <small>
                    ";
        // line 23
        if (twig_in_filter("admin", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 23, $this->source); })()), "user", [], "any", false, false, false, 23), "roles", [], "any", false, false, false, 23))) {
            // line 24
            echo "                        Admin:
                    ";
        } else {
            // line 26
            echo "                        User:
                    ";
        }
        // line 28
        echo "                    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 28, $this->source); })()), "user", [], "any", false, false, false, 28), "username", [], "any", false, false, false, 28), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 28, $this->source); })()), "postdate", [], "any", false, false, false, 28), "d-m-Y"), "html", null, true);
        echo "
                </small>
            </em>
            ";
        // line 31
        if (twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 31, $this->source); })()), "image", [], "any", false, false, false, 31)) {
            // line 32
            echo "                <img src=\"";
            echo twig_escape_filter($this->env, ("/assets/images/" . twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 32, $this->source); })()), "image", [], "any", false, false, false, 32)), "html", null, true);
            echo "\" class=\"d-block blog-list-img m-auto\" />
            ";
        }
        // line 34
        echo "            <p class=\"text-break\"> ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 34, $this->source); })()), "description", [], "any", false, false, false, 34), "html", null, true);
        echo "</p>
        </div>
        <a href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("like_post", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 36, $this->source); })()), "id", [], "any", false, false, false, 36), "like" => "like"]), "html", null, true);
        echo "\"><i class=\"fas fa-heart text-secondary\"></i></a>
        <small class=\"text-secondary\">
            ";
        // line 38
        if (twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 38, $this->source); })()), "likescount", [], "any", false, false, false, 38)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 38, $this->source); })()), "likescount", [], "any", false, false, false, 38), "html", null, true);
            echo "
            ";
        } else {
            // line 39
            echo " 0
            ";
        }
        // line 41
        echo "        </small>


        <div class=\"comments mt-5\">
            ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 45, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 46
            echo "                <div class=\"comment mb-3 bg-light py-1 px-2 position-relative\">
                    <div class=\"user-info-head d-flex align-items-center\">
                        ";
            // line 48
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "user", [], "any", false, false, false, 48), "image", [], "any", false, false, false, 48)) {
                // line 49
                echo "                            <img class=\"user-image\" src=\"/assets/images/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "user", [], "any", false, false, false, 49), "image", [], "any", false, false, false, 49), "html", null, true);
                echo "\"/>
                        ";
            } else {
                // line 51
                echo "                            <img class=\"user-image\" src=\"/assets/images/userdefault.png\" />
                        ";
            }
            // line 53
            echo "                        <span class=\"ms-2\"><b>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "user", [], "any", false, false, false, 53), "username", [], "any", false, false, false, 53), "html", null, true);
            echo "</b></span>
                    </div>
                    <em class=\"d-block\">
                        <small>
                            ";
            // line 57
            if (twig_in_filter("admin", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "user", [], "any", false, false, false, 57), "roles", [], "any", false, false, false, 57))) {
                echo " Admin - ";
            }
            // line 58
            echo "                            ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "commentdate", [], "any", false, false, false, 58), "d-m-Y"), "html", null, true);
            echo "
                        </small>
                    </em>
                    <p class=\"user-comment text-break m-0\">";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "commenttext", [], "any", false, false, false, 61), "html", null, true);
            echo "</p>
                    <a href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("like_comment", ["id" => twig_get_attribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 62), "post" => twig_get_attribute($this->env, $this->source, (isset($context["post"]) || array_key_exists("post", $context) ? $context["post"] : (function () { throw new RuntimeError('Variable "post" does not exist.', 62, $this->source); })()), "id", [], "any", false, false, false, 62)]), "html", null, true);
            echo "\"><i class=\"fas fa-heart text-secondary\"></i></a>
                    <small class=\"text-secondary\">
                        ";
            // line 64
            if (twig_get_attribute($this->env, $this->source, $context["comment"], "likes", [], "any", false, false, false, 64)) {
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "likes", [], "any", false, false, false, 64), "html", null, true);
                echo "
                        ";
            } else {
                // line 65
                echo " 0
                        ";
            }
            // line 67
            echo "                    </small>
                    ";
            // line 68
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 68), "roles", [], "any", true, true, false, 68) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 68, $this->source); })()), "user", [], "any", false, false, false, 68), "roles", [], "any", false, false, false, 68)))) {
                // line 69
                echo "                        ";
                if (twig_in_filter("admin", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "user", [], "any", false, false, false, 69), "roles", [], "any", false, false, false, 69))) {
                    // line 70
                    echo "                            <span onclick=\"clickEdit('comment', ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 70), "html", null, true);
                    echo ", event)\" class=\"comment-edit d-block text-secondary\">...</span>
                            <div class=\"edit-menu edit-cmnt_";
                    // line 71
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 71), "html", null, true);
                    echo " d-none\"></div>
                        ";
                } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 72
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 72, $this->source); })()), "user", [], "any", false, false, false, 72), "id", [], "any", false, false, false, 72) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "user", [], "any", false, false, false, 72), "id", [], "any", false, false, false, 72))) {
                    // line 73
                    echo "                            <span onclick=\"clickEdit('comment', ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 73), "html", null, true);
                    echo ", event)\" class=\"comment-edit d-block text-secondary\">...</span>
                            <div class=\"edit-menu edit-cmnt_";
                    // line 74
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 74), "html", null, true);
                    echo " d-none\"></div>
                        ";
                } else {
                    // line 76
                    echo "                        ";
                }
                // line 77
                echo "                    ";
            }
            // line 78
            echo "                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "            <div class=\"pagination_custom-style comments my-3\">
                ";
        // line 81
        echo $this->extensions['Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension']->render($this->env, (isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 81, $this->source); })()));
        echo "
            </div>

            ";
        // line 84
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 85
            echo "                <div class=\"comment-form\">
                    ";
            // line 86
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["commentForm"]) || array_key_exists("commentForm", $context) ? $context["commentForm"] : (function () { throw new RuntimeError('Variable "commentForm" does not exist.', 86, $this->source); })()), 'form');
            echo "
                </div>
            ";
        }
        // line 89
        echo "        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "post/show.index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  291 => 89,  285 => 86,  282 => 85,  280 => 84,  274 => 81,  271 => 80,  264 => 78,  261 => 77,  258 => 76,  253 => 74,  248 => 73,  246 => 72,  242 => 71,  237 => 70,  234 => 69,  232 => 68,  229 => 67,  225 => 65,  218 => 64,  213 => 62,  209 => 61,  202 => 58,  198 => 57,  190 => 53,  186 => 51,  180 => 49,  178 => 48,  174 => 46,  170 => 45,  164 => 41,  160 => 39,  153 => 38,  148 => 36,  142 => 34,  136 => 32,  134 => 31,  125 => 28,  121 => 26,  117 => 24,  115 => 23,  110 => 20,  107 => 19,  104 => 18,  99 => 16,  94 => 15,  92 => 14,  88 => 13,  83 => 12,  80 => 11,  78 => 10,  74 => 9,  68 => 5,  58 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'baseFrontOffice.html.twig' %}


{% block body %}

    <div class=\"container my-4 py-4 bg-white\">
        <div>
            <div class=\"d-flex text-center justify-content-between position-relative\">
                <h3 class=\"mb-0\">{{ post.title }}</h3>
            {% if app.user.roles is defined and app.user.roles is not null %}
                {% if \"admin\" in app.user.roles %}
                    <span onclick=\"clickEdit('post', {{post.id}}, event)\" class=\"post-edit-info d-block text-secondary\">...</span>
                    <div class=\"edit-menu edit-menu_{{post.id}} d-none\"></div>
                {% elseif app.user.id == post.user.id %}
                    <span onclick=\"clickEdit('post', {{post.id}}, event)\" class=\"post-edit-info d-block text-secondary\">...</span>
                    <div class=\"edit-menu edit-menu_{{post.id}} d-none\"></div>
                {% else %}
                {% endif %}
            {% endif %}
            </div>
            <em class=\"d-block mb-2 text-secondary\">
                <small>
                    {% if \"admin\" in post.user.roles %}
                        Admin:
                    {% else %}
                        User:
                    {% endif %}
                    {{post.user.username}} - {{ post.postdate|date('d-m-Y') }}
                </small>
            </em>
            {% if post.image %}
                <img src=\"{{ '/assets/images/' ~ post.image }}\" class=\"d-block blog-list-img m-auto\" />
            {% endif %}
            <p class=\"text-break\"> {{ post.description }}</p>
        </div>
        <a href=\"{{ path(\"like_post\", {id:post.id, like:\"like\"}) }}\"><i class=\"fas fa-heart text-secondary\"></i></a>
        <small class=\"text-secondary\">
            {% if post.likescount %} {{post.likescount}}
            {% else %} 0
            {% endif %}
        </small>


        <div class=\"comments mt-5\">
            {% for comment in comments %}
                <div class=\"comment mb-3 bg-light py-1 px-2 position-relative\">
                    <div class=\"user-info-head d-flex align-items-center\">
                        {% if comment.user.image %}
                            <img class=\"user-image\" src=\"/assets/images/{{comment.user.image}}\"/>
                        {% else %}
                            <img class=\"user-image\" src=\"/assets/images/userdefault.png\" />
                        {% endif %}
                        <span class=\"ms-2\"><b>{{ comment.user.username }}</b></span>
                    </div>
                    <em class=\"d-block\">
                        <small>
                            {% if \"admin\" in comment.user.roles %} Admin - {% endif %}
                            {{ comment.commentdate|date('d-m-Y') }}
                        </small>
                    </em>
                    <p class=\"user-comment text-break m-0\">{{ comment.commenttext }}</p>
                    <a href=\"{{ path(\"like_comment\", {id:comment.id, post:post.id}) }}\"><i class=\"fas fa-heart text-secondary\"></i></a>
                    <small class=\"text-secondary\">
                        {% if comment.likes %} {{comment.likes}}
                        {% else %} 0
                        {% endif %}
                    </small>
                    {% if app.user.roles is defined and app.user.roles is not null %}
                        {% if \"admin\" in app.user.roles %}
                            <span onclick=\"clickEdit('comment', {{comment.id}}, event)\" class=\"comment-edit d-block text-secondary\">...</span>
                            <div class=\"edit-menu edit-cmnt_{{comment.id}} d-none\"></div>
                        {% elseif app.user.id == comment.user.id %}
                            <span onclick=\"clickEdit('comment', {{comment.id}}, event)\" class=\"comment-edit d-block text-secondary\">...</span>
                            <div class=\"edit-menu edit-cmnt_{{comment.id}} d-none\"></div>
                        {% else %}
                        {% endif %}
                    {% endif %}
                </div>
            {% endfor %}
            <div class=\"pagination_custom-style comments my-3\">
                {{ knp_pagination_render(comments) }}
            </div>

            {% if is_granted('IS_AUTHENTICATED_FULLY') %}
                <div class=\"comment-form\">
                    {{ form(commentForm) }}
                </div>
            {% endif %}
        </div>
    </div>

{% endblock %}", "post/show.index.twig", "C:\\Users\\hiche\\OneDrive\\Bureau\\Symfony-Blog-main\\Symfony-Blog-main\\templates\\post\\show.index.twig");
    }
}
