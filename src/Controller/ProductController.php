<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CarRepository;
use App\Entity\Car;
use App\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_product')]
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('product/index.html.twig', [
            'products' => $carRepository->findAll(),
        ]);
    }

    #[Route('/product/{id<\d+>}', name: 'app_product_id')]
    public function show(Car $product): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/product/new', name: 'app_product_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $productEntity = new Car();
        $form = $this->createForm(ProductType::class, $productEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($productEntity);
            $entityManager->flush();

            $this->addFlash('success', 'Product created successfully');

            return $this->redirectToRoute('app_product_id',[
                'id' => $productEntity->getId(),
            ]);
        }

        return $this->render('product/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/product/{id<\d+>}/edit', name: 'app_product_edit')]
    public function edit(Request $request, Car $product, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Product updated successfully');

            return $this->redirectToRoute('app_product_id',[
                'id' => $product->getId(),
            ]);
        }

        return $this->render('product/edit.html.twig', [
            'product' => $product,
            'form' => $form,
        ]);
    }

    #[Route('/product/{id<\d+>}/delete', name: 'app_product_delete')]
    public function delete(Request $request, Car $product, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $entityManager->remove($product);
            $entityManager->flush();

            $this->addFlash('success', 'Product deleted successfully');

            return $this->redirectToRoute('app_product');
        }
        return $this->render('product/delete.html.twig', [
            'id' => $product->getId(),
        ]);
    }
}
