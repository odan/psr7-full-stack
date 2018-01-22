<?php

namespace App\Controller;

use App\Model\UserModel;
use Interop\Container\Exception\ContainerException;
use Psr\Http\Message\ResponseInterface;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * HomeController
 */
class HomeController extends AbstractController
{
    /**
     * @var UserModel
     */
    protected $userModel;

    /**
     * Constructor.
     *
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->userModel = $container->get(UserModel::class);
    }

    /**
     * Index action
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function indexAction(Request $request, Response $response): ResponseInterface
    {
        // Increment counter
        $counter = $this->session->get('counter', 0);
        $counter++;
        $this->session->set('counter', $counter);

        $text = [
            'Loaded successfully!' => __('Loaded successfully!')
        ];

        $viewData = $this->getViewData([
            'text' => $text,
            'counter' => $counter,
            'url' => $request->getUri(),
            'secure' => $request->getAttribute('secure') ? __('Yes') : __('No'),
        ]);

        // Render template
        return $this->render($response, 'Home/home-index.twig', $viewData);
    }

    /**
     * Action (Json)
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface Json response
     */
    public function loadAction(Request $request, Response $response): ResponseInterface
    {
        $userId = $this->auth->getId();
        $user = $this->userModel->getById($userId);

        $result = [
            'message' => __('Loaded successfully!'),
            'now' => now(),
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
        ];

        return $response->withJson($result);
    }

    /**
     * Action (Json)
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface Json response
     */
    public function pingAction(Request $request, Response $response): ResponseInterface
    {
        $data = $request->getParsedBody();
        return $response->withJson($data);
    }

    /**
     * Returns default text.
     *
     * @return array Array with translated text
     */
    protected function getText(): array
    {
        $text = parent::getText();

        $text['Current user'] = __('Current user');
        $text['User-ID'] = __('User-ID');
        $text['Username'] = __('Username');
        $text['Its'] = __("It's");

        return $text;
    }
}
