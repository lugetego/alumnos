<?php

namespace App\Controller;

use App\Entity\Alumnos;
use App\Form\AlumnosType;
use App\Repository\AlumnosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/alumnos")
 */
class AlumnosController extends AbstractController
{
    /**
     * @Route("/lista", name="app_alumnos_lista", methods={"GET"})
     */
    public function lista(AlumnosRepository $alumnosRepository): Response
    {
        return $this->render('alumnos/index.html.twig', [
            'alumnos' => $alumnosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/", name="app_alumnos_index", methods={"GET"})
     */
    public function index(AlumnosRepository $alumnosRepository): Response
    {

        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->render('alumnos/alumnos.html.twig', [
                'alumnos' => $alumnosRepository->findAll(),
            ]);

        }
        else {
            return $this->render('alumnos/alumnos.html.twig', [
                'alumnos' => $alumnosRepository->findByAviso(true),
            ]);

        }

    }

    /**
     * @Route("/new", name="app_alumnos_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AlumnosRepository $alumnosRepository): Response
    {
        $alumno = new Alumnos();
        $form = $this->createForm(AlumnosType::class, $alumno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $alumnosRepository->add($alumno, true);

            return $this->redirectToRoute('app_alumnos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('alumnos/new.html.twig', [
            'alumno' => $alumno,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{slug}", name="app_alumnos_show", methods={"GET"})
     */
    public function show(Alumnos $alumno): Response
    {
        return $this->render('alumnos/show.html.twig', [
            'alumno' => $alumno,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="app_alumnos_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Alumnos $alumno, AlumnosRepository $alumnosRepository): Response
    {
        $form = $this->createForm(AlumnosType::class, $alumno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $alumno->setModified(new \DateTime());
            $alumnosRepository->add($alumno, true);

            return $this->redirectToRoute('app_alumnos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('alumnos/edit.html.twig', [
            'alumno' => $alumno,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_alumnos_delete", methods={"POST"})
     */
    public function delete(Request $request, Alumnos $alumno, AlumnosRepository $alumnosRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alumno->getId(), $request->request->get('_token'))) {
            $alumnosRepository->remove($alumno, true);
        }

        return $this->redirectToRoute('app_alumnos_index', [], Response::HTTP_SEE_OTHER);
    }
}
