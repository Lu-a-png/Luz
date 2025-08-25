---

# Infinite Lighting Plugin (Luz)

[English below]

## Descrição

O **Infinite Lighting Plugin** oferece aos jogadores controle total sobre a iluminação pessoal no servidor, com modos automáticos e manuais. Ideal para servidores PocketMine-MP, garante máxima visibilidade em qualquer ambiente, aumentando a jogabilidade e imersão sem comprometer o desempenho.

### Funcionalidades

- **Comando principal:**  
  `/light <auto|on|off>`

  - `auto`: Ativa o modo automático, monitorando a luminosidade ao redor do jogador. Aplica visão noturna em ambientes escuros e remove em ambientes claros.
  - `on`: Liga a iluminação infinita manualmente, mantendo a visão noturna até ser desativada.
  - `off`: Desativa o efeito de iluminação, retornando à iluminação natural do jogo.

- **Permissão:**  
  `light.use` — Necessária para usar qualquer modo do comando `/light`.

- **Detecção Inteligente de Luz:**  
  Aplica visão noturna apenas quando realmente necessário, evitando efeitos desnecessários.

- **Mensagens intuitivas:**  
  O jogador recebe avisos rápidos ao ativar/desativar modos.

- **Desempenho:**  
  Apenas jogadores no modo auto são monitorados, evitando sobrecarga no servidor.

### Exemplo de Uso

- Ativar modo automático: `/light auto`
- Manter luz sempre ligada: `/light on`
- Desativar qualquer iluminação extra: `/light off`

### Observações Técnicas

- Compatível com PocketMine-MP.
- Usa o efeito Night Vision com duração máxima.
- Threshold de luz configurável via constante (`LIGHT_THRESHOLD`), padrão em 7.

---

## Infinite Lighting Plugin

**Infinite Lighting Plugin** gives players full control of their personal lighting on the server, with both automatic and manual modes. Perfect for PocketMine-MP servers, it ensures maximum visibility in any environment, enhancing gameplay and immersion without compromising performance.

### Features

- **Main command:**  
  `/light <auto|on|off>`

  - `auto`: Enables automatic mode. The plugin monitors the player's surrounding light level, applying night vision in dark environments and removing it in bright ones.
  - `on`: Manually switches on infinite lighting, keeping night vision until deactivated.
  - `off`: Turns off the lighting effect, returning to the game’s default lighting.

- **Permission:**  
  `light.use` — Required to use any `/light` command mode.

- **Smart Light Detection:**  
  Night vision is only applied when truly needed, avoiding unnecessary effects.

- **Intuitive Messaging:**  
  Players receive quick tips when activating or deactivating modes.

- **Performance:**  
  Only players in auto mode are monitored, preventing unnecessary server load.

### Usage Example

- Activate automatic mode: `/light auto`
- Keep light always on: `/light on`
- Disable any extra lighting: `/light off`

### Technical Notes

- Compatible with PocketMine-MP.
- Uses Night Vision effect with maximum duration.
- Light threshold configurable via constant (`LIGHT_THRESHOLD`), default is 7.

---