<?php

namespace MySite\DataBaseBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UsuarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuarioRepository extends EntityRepository
{
    public function getDineroGastado($objUser) {
        $q = $this->createQueryBuilder('query')
                ->select('g')
                ->from('MySiteDataBaseBundle:Gasto', 'g')
                ->join('g.usuario', 'u')
                ->where('u = :user AND g.cuenta is null')
                ->setParameter('user', $objUser)
                ->getQuery();

        $gastos = $q->getResult();
        $total = 0;
        foreach ($gastos as $objGasto) {
            $total += $objGasto->getCantidad();
        }
        return $total;
    }
    
    public function getDineroApartado($objUser) {
        $q = $this->createQueryBuilder('query')
                ->select('g')
                ->from('MySiteDataBaseBundle:Gasto', 'g')
                ->join('g.usuario', 'u')
                ->where('u = :user AND g.cuenta is null AND g.future = 1')
                ->setParameter('user', $objUser)
                ->getQuery();

        $gastos = $q->getResult();
        $total = 0;
        foreach ($gastos as $objGasto) {
            $total += $objGasto->getCantidad();
        }
        return $total;
    }
    
    public function getCategoriasOrderByDescription($objUser) {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT c
             FROM MySiteDataBaseBundle:Categoria c
                    JOIN c.usuarios u  
             WHERE u = :puser 
             ORDER BY c.descripcion '
        )->setParameter('puser', $objUser);
        
        $categorias = $query->getResult();
        return $categorias;
    }
}