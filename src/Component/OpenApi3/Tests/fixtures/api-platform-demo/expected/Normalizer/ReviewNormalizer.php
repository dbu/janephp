<?php

namespace ApiPlatform\Demo\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use ApiPlatform\Demo\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ReviewNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'ApiPlatform\\Demo\\Model\\Review';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'ApiPlatform\\Demo\\Model\\Review';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \ApiPlatform\Demo\Model\Review();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('body', $data)) {
            $object->setBody($data['body']);
        }
        if (\array_key_exists('rating', $data)) {
            $object->setRating($data['rating']);
        }
        if (\array_key_exists('letter', $data)) {
            $object->setLetter($data['letter']);
        }
        if (\array_key_exists('author', $data)) {
            $object->setAuthor($data['author']);
        }
        if (\array_key_exists('publicationDate', $data)) {
            $object->setPublicationDate(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['publicationDate']));
        }
        if (\array_key_exists('book', $data)) {
            $object->setBook($this->denormalizer->denormalize($data['book'], 'ApiPlatform\\Demo\\Model\\Book', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getBody()) {
            $data['body'] = $object->getBody();
        }
        if (null !== $object->getRating()) {
            $data['rating'] = $object->getRating();
        }
        if (null !== $object->getLetter()) {
            $data['letter'] = $object->getLetter();
        }
        if (null !== $object->getAuthor()) {
            $data['author'] = $object->getAuthor();
        }
        if (null !== $object->getPublicationDate()) {
            $data['publicationDate'] = $object->getPublicationDate()->format('Y-m-d\\TH:i:sP');
        }
        $data['book'] = $this->normalizer->normalize($object->getBook(), 'json', $context);
        return $data;
    }
}