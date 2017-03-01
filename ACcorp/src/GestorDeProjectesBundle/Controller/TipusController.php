<?php

namespace GestorDeProjectesBundle\Controller;

use GestorDeProjectesBundle\Entity\Tipus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GestorDeProjectesBundle\Form\ProjecteType;
/**
 * Tipus controller.
 *
 */
class TipusController extends Controller
{
    /**
     * Lists all tipus entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipuses = $em->getRepository('GestorDeProjectesBundle:Tipus')->findAll();

        return $this->render('GestorDeProjectesBundle:tipus:index.html.twig', array(
            'tipuses' => $tipuses,
        ));
    }

    /**
     * Creates a new tipus entity.
     *
     */
    public function newAction(Request $request)
    {
        $tipus = new Tipus();
        $form = $this->createForm('GestorDeProjectesBundle\Form\TipusType', $tipus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipus);
            $em->flush($tipus);

            return $this->redirectToRoute('tipus_show', array('id' => $tipus->getId()));
        }

        return $this->render('GestorDeProjectesBundle:tipus:new.html.twig', array(
            'tipus' => $tipus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipus entity.
     *
     */
    public function showAction(Tipus $tipus)
    {
        $deleteForm = $this->createDeleteForm($tipus);

        return $this->render('tipus/show.html.twig', array(
            'tipus' => $tipus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipus entity.
     *
     */
    public function editAction(Request $request, Tipus $tipus)
    {
        $deleteForm = $this->createDeleteForm($tipus);
        $editForm = $this->createForm('GestorDeProjectesBundle\Form\TipusType', $tipus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipus_edit', array('id' => $tipus->getId()));
        }

        return $this->render('GestorDeProjectesBundle:tipus:edit.html.twig', array(
            'tipus' => $tipus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipus entity.
     *
     */
    public function deleteAction(Request $request, Tipus $tipus)
    {
        $form = $this->createDeleteForm($tipus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipus);
            $em->flush($tipus);
        }

        return $this->redirectToRoute('tipus_index');
    }

    /**
     * Creates a form to delete a tipus entity.
     *
     * @param Tipus $tipus The tipus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tipus $tipus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipus_delete', array('id' => $tipus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
