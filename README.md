# Índice del Proyecto: Desplegament d'infraestructura

- [Objectiu](#objectiu)
- [Requisits de projecte](#requisits-de-projecte)
- [Hardware de xarxa](#hardware-de-xarxa)
- [Hardware de servei](#hardware-de-servei)
- [Hardware clients](#hardware-clients)
- [Proves](#proves)
- [Documentació i control de versions](#documentacio-i-control-de-versions)

---

## Objectiu
- Preparar la infraestructura per una aplicació multicapa (Web Server, Monitor de xarxes, SSH, BBDD, DHCP, DNS, FTP)
- Nomenclatura dels equips (NCC i número d'equip)
- Duració prevista

## Requisits de projecte
- Planificació de tasques amb Proofhub
- Sprints quinzenals (3 en total)
- Definició backlog i nomenclatura de projecte
- Usuari per accedir als equips: bchecker / Pw: bchecker121
- Diagrama d'arquitectura
- Configuració i documentació en repositori Git

## Hardware de xarxa
- Desplegament de router (Hostname: R-NCC)
  - Xarxes: DMZ, Intranet, NAT

## Hardware de servei
- Web Server (Hostname: W-NCC)
- SSH
- Base de dades (Hostname: B-NCC, usuari bchecker)
  - MySQL
  - Càrrega de dades CSV (equipaments educatius de Barcelona)
- DHCP
- DNS (resolució per R-NCC i R)
- FTP (Hostname: F-NCC)

## Hardware clients
- 2 PCs:
  - 1 amb Windows
  - 1 amb Linux

## Proves
- Desplegament d'una aplicació petita per mostrar contingut de les taules carregades

## Documentació i control de versions
- Creació del repositori a GitHub
- Validació amb clau pública/privada
- Documentació del control de versions (GIT ADD / PUSH / PULL / CLONE / COMMIT -M)
- Estructura d'arbre de documentació Markdown al repositori
