<?php

namespace GestorDeProjectesBundle\Controller;

use GestorDeProjectesBundle\Entity\Projecte;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GestorDeProjectesBundle\Form\ProjecteType;
/**
 * Projecte controller.
 *
 */
class ProjecteController extends Controller
{
    /**
     * Lists all projecte entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projectes = $em->getRepository('GestorDeProjectesBundle:Projecte')->findAll();

        return $this->render('GestorDeProjectesBundle:projecte:index.html.twig', array(
            'projectes' => $projectes,
        ));
    }

    /**
     * Creates a new projecte entity.
     *
     */
    public function newAction(Request $request)
    {
        $projecte = new Projecte();
        $form = $this->createForm('GestorDeProjectesBundle\Form\ProjecteType', $projecte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projecte);
            $em->flush($projecte);

            return $this->redirectToRoute('projecte_show', array('id' => $projecte->getId()));
        }

        return $this->render('GestorDeProjectesBundle:projecte:new.html.twig', array(
            'projecte' => $projecte,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a projecte entity.
     *
     */
    public function showAction(Projecte $projecte)
    {
        $deleteForm = $this->createDeleteForm($projecte);

        return $this->render('GestorDeProjectesBundle:projecte:show.html.twig', array(
            'projecte' => $projecte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing projecte entity.
     *
     */
    public function editAction(Request $request, Projecte $projecte)
    {
        $deleteForm = $this->createDeleteForm($projecte);
        $editForm = $this->createForm('GestorDeProjectesBundle\Form\ProjecteType', $projecte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projecte_edit', array('id' => $projecte->getId()));
        }

        return $this->render('GestorDeProjectesBundle:projecte:edit.html.twig', array(
            'projecte' => $projecte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a projecte entity.
     *
     */
    public function deleteAction(Request $request, Projecte $projecte)
    {
        $form = $this->createDeleteForm($projecte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projecte);
            $em->flush($projecte);
        }

        return $this->redirectToRoute('projecte_index');
    }

    /**
     * Creates a form to delete a projecte entity.
     *
     * @param Projecte $projecte The projecte entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Projecte $projecte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projecte_delete', array('id' => $projecte->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
