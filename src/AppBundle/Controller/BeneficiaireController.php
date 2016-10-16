<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Beneficiaire;
use AppBundle\Form\BeneficiaireType;
//use AppBundle\Entity\Domaine;

/**
 * Beneficiaire controller.
 *
 * @Route("/admin/beneficiaires")
 */
class BeneficiaireController extends Controller
{
    /**
     * Lists all Beneficiaire entities.
     *
     * @Route("/", name="admin_beneficiaires_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $beneficiaires = $em->getRepository('AppBundle:Beneficiaire')->findAll();

        return $this->render('beneficiaire/index.html.twig', array(
            'beneficiaires' => $beneficiaires,
        ));
    }

    /**
     * Creates a new Beneficiaire entity.
     *
     * @Route("/new", name="admin_beneficiaires_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $beneficiaire = new Beneficiaire();
        $form = $this->createForm('AppBundle\Form\BeneficiaireType', $beneficiaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // Recueration du code de la zone
            $zone = $em->getRepository('AppBundle:Zone')->requeteZoneCode($beneficiaire->getZone());

            // Generation du matricule du beneficiaire
            $code = $em->getRepository('AppBundle:Beneficiaire')->generationCode();

            // Generation d'une lettre aleatoire
            $lettre = $em->getRepository('AppBundle:Beneficiaire')->generationLettre();

            $matricule = $zone.''.$code.' '.$lettre;

            // Creation en dur de la valeur
            $beneficiaire->setMatricule($matricule);
            $em->persist($beneficiaire);
            $em->flush();

            return $this->redirectToRoute('admin_beneficiaires_show', array('id' => $beneficiaire->getId()));
        }

        return $this->render('beneficiaire/new.html.twig', array(
            'beneficiaire' => $beneficiaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Beneficiaire entity.
     *
     * @Route("/{id}", name="admin_beneficiaires_show")
     * @Method("GET")
     */
    public function showAction(Beneficiaire $beneficiaire)
    {
        $deleteForm = $this->createDeleteForm($beneficiaire);

        return $this->render('beneficiaire/show.html.twig', array(
            'beneficiaire' => $beneficiaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Beneficiaire entity.
     *
     * @Route("/{id}/edit", name="admin_beneficiaires_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Beneficiaire $beneficiaire)
    {
        $deleteForm = $this->createDeleteForm($beneficiaire);
        $editForm = $this->createForm('AppBundle\Form\BeneficiaireType', $beneficiaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($beneficiaire);
            $em->flush();

            return $this->redirectToRoute('admin_beneficiaires_show', array('id' => $beneficiaire->getId()));
        }

        return $this->render('beneficiaire/edit.html.twig', array(
            'beneficiaire' => $beneficiaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Beneficiaire entity.
     *
     * @Route("/{id}", name="admin_beneficiaires_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Beneficiaire $beneficiaire)
    {
        $form = $this->createDeleteForm($beneficiaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($beneficiaire);
            $em->flush();
        }

        return $this->redirectToRoute('admin_beneficiaires_index');
    }

    /**
     * Creates a form to delete a Beneficiaire entity.
     *
     * @param Beneficiaire $beneficiaire The Beneficiaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Beneficiaire $beneficiaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_beneficiaires_delete', array('id' => $beneficiaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
