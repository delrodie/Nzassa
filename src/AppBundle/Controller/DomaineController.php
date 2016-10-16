<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Domaine;
use AppBundle\Form\DomaineType;
use AppBundle\Repository\ZoneRepository;

/**
 * Domaine controller.
 *
 * @Route("/admin/domaines")
 */
class DomaineController extends Controller
{
    /**
     * Lists all Domaine entities.
     *
     * @Route("/", name="admin_domaines_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $domaines = $em->getRepository('AppBundle:Domaine')->findAll();

        $domaine = new Domaine();
        $form = $this->createForm('AppBundle\Form\DomaineType', $domaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$em = $this->getDoctrine()->getManager();

            // Recuperation du code
            $dernierId = $em->getRepository('AppBundle:Domaine')->getDernierId();

            $domaine->setCode($dernierId);
            $em->persist($domaine);
            $em->flush();

            $this->addFlash(
                'Notification',
                'Enregistrement effectué avec succès'
            );

            return $this->redirectToRoute('admin_domaines_index');
        }

        return $this->render('domaine/index.html.twig', array(
            'domaines' => $domaines,
            'domaine' => $domaine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new Domaine entity.
     *
     * @Route("/new", name="admin_domaines_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $domaine = new Domaine();
        $form = $this->createForm('AppBundle\Form\DomaineType', $domaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($domaine);
            $em->flush();

            return $this->redirectToRoute('admin_domaines_show', array('id' => $domaine->getId()));
        }

        return $this->render('domaine/new.html.twig', array(
            'domaine' => $domaine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Domaine entity.
     *
     * @Route("/{id}", name="admin_domaines_show")
     * @Method("GET")
     */
    public function showAction(Domaine $domaine)
    {
        $deleteForm = $this->createDeleteForm($domaine);

        return $this->render('domaine/show.html.twig', array(
            'domaine' => $domaine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Domaine entity.
     *
     * @Route("/{id}/edit", name="admin_domaines_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Domaine $domaine)
    {
        $deleteForm = $this->createDeleteForm($domaine);
        $editForm = $this->createForm('AppBundle\Form\DomaineType', $domaine);
        $editForm->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $domaines = $em->getRepository('AppBundle:Domaine')->findAll();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($domaine);
            $em->flush();

            $this->addFlash(
                'Notification',
                'Modification effectuée avec succès'
            );

            return $this->redirectToRoute('admin_domaines_index');
        }

        return $this->render('domaine/edit.html.twig', array(
            'domaine' => $domaine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'domaines' => $domaines,
        ));
    }

    /**
     * Deletes a Domaine entity.
     *
     * @Route("/{id}", name="admin_domaines_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Domaine $domaine)
    {
        $form = $this->createDeleteForm($domaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($domaine);
            $em->flush();
        }

        return $this->redirectToRoute('admin_domaines_index');
    }

    /**
     * Creates a form to delete a Domaine entity.
     *
     * @param Domaine $domaine The Domaine entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Domaine $domaine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_domaines_delete', array('id' => $domaine->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
