# Decisions

## ADR-001 — Start with Laravel + PostgreSQL + Blade

- **Status:** Accepted
- **Context:** Business/management discovery identified these capabilities:
- users and authorization
- durable shared persistence
- file storage
- **Decision:** Use the Laravel + PostgreSQL + Blade profile with this architecture: Server-centric Laravel application with Blade and PostgreSQL for shared relational data.
- **Reasoning:** Server-centric business workflows with durable data fit Laravel conventions and progressive Blade UI.
- **Rejected alternative:** Django + PostgreSQL when Python or Django Admin materially reduces product work. It was not selected because its tradeoff did not fit the discovered requirements as well as the primary profile.

## ADR-002 — Establish the confirmed public visual identity without a frontend build step

- **Status:** Accepted
- **Context:** The first public slice needs to establish the future site's visual language while the product has no component framework, verified business details, or final photography. FyB confirmed its red-and-black logo as the primary brand reference.
- **Decision:** Build `/` with semantic Blade, a small progressive-enhancement script, and reusable CSS tokens. Use the FyB logo in navigation and footer, white and near-black as the neutral foundation, an AA-safe brand red for primary actions and states, and orange only as a sparse secondary accent. Keep a taller white sticky header with a red CTA and an icon-only mobile menu; use photography and restrained automotive texture to add depth to major sections.
- **Reasoning:** This aligns the interface hierarchy with the confirmed identity and the selected CarServ reference while keeping text contrast measurable, the server-centric architecture intact, and the visual system straightforward to evolve.
- **Rejected alternative:** Add a frontend framework or CSS library for the first landing page. Its installation and abstraction cost are not justified by this single public surface.

## ADR-003 — Model public contact channels by branch

- **Status:** Accepted
- **Context:** FyB operates two branches, and every published number supports both calls and WhatsApp. A single global phone/WhatsApp pair cannot represent that structure without ambiguity.
- **Decision:** Store public contact data as branches in `config/fyb.php`. Each branch owns its address and a list of normalized WhatsApp contacts. Render branch and contact data through reusable Blade view components in both the location section and footer; each number is a plain text link to its verified `wa.me` URL.
- **Reasoning:** A branch-first model keeps each address and its channels together, avoids duplicate phone/WhatsApp buttons, and prevents future pages from duplicating contact markup.
- **Rejected alternative:** Separate global `phone` and `whatsapp` fields or a UI dependency for the location cards. Both would add ambiguity or disproportionate complexity.
