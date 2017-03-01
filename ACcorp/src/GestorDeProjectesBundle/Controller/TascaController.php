<?php

namespace GestorDeProjectesBundle\Controller;

use GestorDeProjectesBundle\Entity\Tasca;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GestorDeProjectesBundle\Form\TascaType;
/**
 * Tasca controller.
 *
 */
class TascaController extends Controller
{
    /**
     * Lists all tasca entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tascas = $em->getRepository('GestorDeProjectesBundle:Tasca')->findAll();

        return $this->render('GestorDeProjectesBundle:tasca:index.html.twig', array(
            'tascas' => $tascas,
        ));
    }

    /**
     * Creates a new tasca entity.
     *
     */
    public function newAction(Request $request)
    {
        $tasca = new Tasca();
        $form = $this->createForm('GestorDeProjectesBundle\Form\TascaType', $tasca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tasca);
            $em->flush($tasca);

            return $this->redirectToRoute('tasca_show', array('id' => $tasca->getId()));
        }

        return $this->render('GestorDeProjectesBundle:tasca:new.html.twig', array(
            'tasca' => $tasca,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tasca entity.
     *
     */
    public function showAction(Tasca $tasca)
    {
        $deleteForm = $this->createDeleteForm($tasca);

        return $this->render('GestorDeProjectesBundle:tasca:show.html.twig', array(
            'tasca' => $tasca,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tasca entity.
     *
     */
    public function editAction(Request $request, Tasca $tasca)
    {
        $deleteForm = $this->createDeleteForm($tasca);
        $editForm = $this->createForm('GestorDeProjectesBundle\Form\TascaType', $tasca);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tasca_edit', array('id' => $tasca->getId()));
        }

        return $this->render('GestorDeProjectesBundle:tasca:edit.html.twig', array(
            'tasca' => $tasca,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tasca entity.
     *
     */
    public function deleteAction(Request $request, Tasca $tasca)
    {
        $form = $this->createDeleteForm($tasca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tasca);
            $em->flush($tasca);
        }

        return $this->redirectToRoute('tasca_index');
    }

    /**
     * Creates a form to delete a tasca entity.
     *
     * @param Tasca $tasca The tasca entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tasca $tasca)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tasca_delete', array('id' => $tasca->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
